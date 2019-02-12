<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace functions;
use Session,Redirect;

class OwnLibrary {

    //put your code here
    public static function numberformat($num = 0){
        return number_format($num, 2, '.', ',');
    }
    
    public static function printDate($date = '0000-00-00'){
        
        return date('F jS, Y', strtotime($date));
    }
    
    public static function printDateTime($dateTime = '0000-00-00 00:00:00'){
        
        return date('F jS, Y h:i A', strtotime($dateTime));
    }
    
    public static function validateAccess($moduleId = null, $activityId = null) {
        $haystack = Session::get('acl');

        $needle = array($moduleId => $activityId);

        if (!self::in_array_r($needle, $haystack)) {
            echo 'hi';exit;
            header('Location: google.com');
            Redirect::to('user');
        }
    }
    
    public static function in_array_r($needle, $haystack) {

        $needleArr = array_keys($needle);
        $needleKey = $needleArr[0];
        $needleVal = $needle[$needleKey];

        foreach ($haystack as $key => $item) {
            if ($needleKey == $key) {
                foreach ($item as $activityItem) {
                    if ($needleVal == $activityItem) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

}
