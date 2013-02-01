<?php
/**
  * A class for managing sessions
  * @author Youssef Bouhjira
  */
class Session {
    # starts the session
    public function __construct(){
        if(!isset($_SESSION))
            session_start();
    }

    public function __set($name,$value){
        $_SESSION[$name] = $value ;
    }

    public function __get($name){
        return $_SESSION[$name] ;
    }

    public function __isset($name){
        return isset($_SESSION[$name]);
    }

    public function __unset($name){
        unset($_SESSION[$name]);
    }

    # destroys the session completely
    public function destroy(){
        $_SESSION = array();
        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
    }
}
?>