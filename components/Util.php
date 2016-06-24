<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\web\UploadedFile;
use Yii;
use app\components\Scribd;
use app\components\ImageResize;

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
        $scribd = new Scribd(Yii::$app->params['SCRIBD_KEY'], Yii::$app->params['SCRIBD_SECRET']);
        $width = Yii::$app->params['PREVIEW_WIDTH'];
        $height = Yii::$app->params['PREVIEW_HEIGHT'];
        $pdf = '';
        $preview = null;
        $retVal = array();
        $file = UploadedFile::getInstanceByName($fileName);
        $relative_path = '/uploads/document/' . Date('d-m-Y') . '/';
        $storeFolder = Yii::getAlias('@webroot') . $relative_path;
         
        if (!file_exists($storeFolder)) {
            mkdir($storeFolder, 0777, true);
        }
        $save = $storeFolder . time() . $file->baseName . '.' . $file->extension;
        $original_url = $relative_path. time() . $file->baseName . '.' . $file->extension;
        $pdf_path = $storeFolder . time() . $file->baseName . '.pdf';
        $file->saveAs($save);
        $extension = strtolower($file->extension);
        switch ($extension) {
            case 'pdf':
                $file_scribd = $scribd->uploadFromUrl(Yii::getAlias('@web') . $save);
                $preview = $scribd->getPreviewImage($file_scribd['doc_id'], $width, $height);
                break;
            case 'doc':
            case 'docx':
                $file_scribd = $scribd->uploadFromUrl($save);
                $pdf = $scribd->downloadPdfFromUrl($file_scribd['doc_id'], 'pdf');
                $this->downloadFile($pdf, $pdf_path);
                $preview = $scribd->getPreviewImage($file_scribd['doc_id'], $width, $height);
                break;
            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'pjepg':
            case 'gif':
                $preview = ImageResize::resize_image($save, NULL, $width, $height);
                break;
            default:
                $preview = Yii::$app->params['PREVIEW_IMAGE'];
                break;
        }
        
        $retVal['preview'] = $preview;
        $retVal['path'] = $save;
        $retVal['pdf'] = $pdf;
        $retVal['original_url'] = $original_url;
        return $retVal;
    }
    
    public static function getSideBar()
    {
       
    }
    
    public static function checkTopDocument($doc_id)
    {
        
    }

}
