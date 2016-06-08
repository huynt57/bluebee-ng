<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\web\UploadedFile;
use Yii;
use Scribd;
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

    public function getPdfPreview($scribd_id) {
       
    }
    
    public function uploadScribd($url)
    {
        $scribd = new Scribd\API($api_key, $secret);
        $scribd->uploadFromUrl($url);
        return $scribd; 
    }
    
    public function getPdfScribd()
    {
        
    }

    public static function upload($fileName) {
        $retVal = array();
        $file = UploadedFile::getInstanceByName($fileName);
        $storeFolder = Yii::getAlias('@webroot') . '/uploads/document/' . Date('d/m/Y') . '/';   //2
        if (!file_exists($storeFolder)) {
            mkdir($storeFolder, 0777, true);
        }
        $save = $storeFolder . time() . $file->baseName . '.' . $file->extension;
        $file->saveAs($save);
        $extension = strtolower($file->extension);
        switch ($extension) {
            case 'pdf':
                $this->uploadScribd();
                break;
            case 'doc':
            case 'docx':
                $this->uploadScribd();
                $this->getPdfScribd();
                break;
            case 'jpeg':
            case 'jpg':
            case 'png':
            case 'pjepg':
            case 'gif':
                $preview = ImageResize::resize_image($file, $string, $width, $height);
                break;
            default:
                break;
        }
    }

}
