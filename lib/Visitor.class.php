<?php

/**
 * Contains static methods to fetch informations about the visitor
 * @author Youssef Bouhjira
 */
class Visitor {
    public static function getIP(){
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function getOS(){
        static $os;
        if(!$os){
            $src = $_SERVER['HTTP_USER_AGENT'];
            if(stripos($src,'windows') !== false)
                $os = 'Windows' ;
            elseif(stripos($src,'linux') !== false)
                $os = 'Linux';
            elseif(stripos($src,'Mac') !== false)
                $os = 'Mac';
            else
                $os = 'Autre';
        }
        return $os;
    }

    public static function getBrowser(){
        static $browser;
        if(!$browser){
            $src = $_SERVER['HTTP_USER_AGENT'];
            if(stripos($src,'firefox') !== false)
                $browser = 'Firefox' ;
            elseif(stripos($src,'msie') !== false)
                $browser = 'Internet Explorer';
            elseif(stripos($src,'chrome') !== false)
                $browser = 'Chrome';
            elseif(stripos($src,'opera') !== false)
                $browser = 'Opera';
            else
                $browser = 'Autre';
        }
        return $browser;
    }
}
?>