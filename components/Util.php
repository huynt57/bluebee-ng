<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use app\models\Departments;
use yii\web\UploadedFile;
use Yii;
use app\components\Scribd;
use app\components\ImageResize;
use mPDF;
use app\models\Subjects;
use yii\validators\FileValidator;
use yii\helpers\FileHelper;
use app\models\Program;

class Util {

    public static function generateToken($minLength, $maxLength) {
        $token = base_convert(sha1(uniqid(mt_rand(), true)), $minLength, $maxLength);
        return $token;
    }

    public static function stripSpace($string) {
        $nonSpaceString = str_replace(' ', '', $string);
        return $nonSpaceString;
    }

    public static function strip_crlf($string) {
        return str_replace("\r\n", "\n", $string);
    }

    public static function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function generateRandomStringCode($length) {
        $characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function arraySuccess($message = NULL, $data = NULL) {
        return ['status' => 1, 'data' => $data, 'message' => $message];
    }

    public static function arrayError($message = NULL, $data = NULL) {
        return ['status' => 0, 'data' => $data, 'message' => $message];
    }

    public static function makeOuoUrl($url) {
        $link = 'http://ouo.io/api/KzDtJCvY?s=' . $url;
        $ouo = file_get_contents($link);
        return $ouo;
    }

    public static function makeUrlImage($url) {
        if (strpos($url, 'http') === false) {
            $url = Yii::getAlias('@web') . '/' . $url;
        }
        return $url;
    }

    public function downloadFile($url, $path) {
        $newfname = $path;
        $file = fopen($url, 'rb');
        if ($file) {
            $newf = fopen($newfname, 'wb');
            if ($newf) {
                while (!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
    }

    public static function upload($fileName) {
        $ext_arr = ['pdf', 'jpg', 'doc', 'docx', 'jpeg', 'png', 'pjepg', 'gif'];
        $mime_arr = [
            'image/jpeg',
            'image/png',
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/gif'
        ];
        $scribd = new Scribd(Yii::$app->params['SCRIBD_KEY'], Yii::$app->params['SCRIBD_SECRET']);
        $width = Yii::$app->params['PREVIEW_WIDTH'];
        $height = Yii::$app->params['PREVIEW_HEIGHT'];
        $pdf = '';
        $scribd_id = '';
        $preview = null;
        $retVal = array();
        $file = UploadedFile::getInstanceByName($fileName);
        $relative_path = '/uploads/document/' . Date('d-m-Y') . '/';
        $storeFolder = Yii::getAlias('@webroot') . $relative_path;

        if (!file_exists($storeFolder)) {
            mkdir($storeFolder, 0777, true);
        }
        $slug = self::slugify($file->baseName);
        $name = '[Bluebee-uet.com]' . time() . $slug;
        $save = $storeFolder . $name . '.' . $file->extension;
        $original_url = $relative_path . $name . '.' . $file->extension;
        $extension = strtolower($file->extension);
      //  $mime = FileHelper::getMimeType($file);
        if (!in_array($extension, $ext_arr)) {
            return [
                'status' => 0,
                'message' => 'Phần mở rộng file của bạn không hợp lệ'
            ];
        }
        if ($file->size > Yii::$app->params['MAX_FILE_SIZE']) {
            return [
                'status' => 0,
                'message' => 'Bạn không thể tải lên file quá 8MB'
            ];
        }
//        if (!in_array($mime, $mime_arr)) {
//            return [
//                'status' => false,
//                'message' => 'Loại file của bạn không hợp lệ'
//            ];
//        }
        $file->saveAs($save);

        switch ($extension) {
            case 'pdf':
                $file_scribd = $scribd->upload($save);
                $preview = $scribd->getPreviewImage($file_scribd['doc_id'], $width, $height);
                $pdf = $original_url;
                $scribd_id = $file_scribd['doc_id'];
                break;
            case 'doc':
            case 'docx':
                $file_scribd = $scribd->upload($save);
                //$pdf = $scribd->downloadPdfFromUrl($file_scribd['doc_id'], 'pdf');
                //$this->downloadFile($pdf, $pdf_path);
                $preview = $scribd->getPreviewImage($file_scribd['doc_id'], $width, $height);
                $scribd_id = $file_scribd['doc_id'];
                break;
            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'pjepg':
            case 'gif':
                $preview = ImageResize::resize_image($save, NULL, $width, $height);
                //   self::image2Pdf($save, $storeFolder . $pdf_url);
                // $pdf = $relative_path . $pdf_url;
                break;
            default:
                $preview = Yii::$app->params['PREVIEW_IMAGE'];
                break;
        }
        $retVal['scribd_id'] = $scribd_id;
        $retVal['preview'] = $preview;
        $retVal['path'] = $save;
        $retVal['pdf'] = $pdf;
        $retVal['original_url'] = $original_url;
        $retVal['status'] = true;
        return $retVal;
    }

    public static function multipleUpload($fileName) {
        $retVal = array();
        $relative_path = '/uploads/moss/' . Date('d-m-Y') . '/' . time() . '/';
        $storeFolder = Yii::getAlias('@webroot') . $relative_path;
        $files = UploadedFile::getInstancesByName($fileName);
        foreach ($files as $file) {
            if (!file_exists($storeFolder)) {
                mkdir($storeFolder, 0777, true);
            }
            $save = $storeFolder . $file->baseName . '.' . $file->extension;
            $file->saveAs($save);
            $retVal[] = $save;
        }
        return $storeFolder;
    }

    public static function getGender($gender) {
        $result = '';
        $gender = strtolower($gender);
        switch ($gender) {
            case 'male':
                $result = 'Nam';
                break;
            case 'female':
                $result = 'Nữ';
                break;
            default:
                $result = 'Chưa cập nhật';
                break;
        }
        return $result;
    }

    public static function getSideBar() {
        
    }

    public static function checkTopDocument($doc_id) {
        
    }

    public static function getSubjects() {
        return Subjects::find()->orderBy('name')->all();
    }

    public static function getDepartments() {
        return Departments::find()->orderBy('name')->all();
    }

    public static function excerpt($text, $numb) {
        $text = preg_replace("/<img[^>]+\>/i", "(ảnh) ", $text);
        if (strlen($text) > $numb) {
            $text = strip_tags($text);
            $text = substr($text, 0, $numb);
            $text = substr($text, 0, strrpos($text, " "));
            $etc = " ...";
            $text = $text . $etc;
        }
        return $text;
    }

    public static function image2Pdf($inputPath, $outputPath) {
        $mpdf = new \mPDF();
        $html = '<img src="' . $inputPath . '"/>';
        $mpdf->WriteHTML($html);
        $mpdf->Output($outputPath, 'F');
        $mpdf->debug = true;
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function suggest($department_id, $semester)
    {
        $args = [
            'department_id' => $department_id,
            'semester' => $semester
        ];

        $data = Program::getProgramByAttribute($args);
        return $data;
    }

}
