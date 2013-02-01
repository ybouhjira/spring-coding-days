<?php 
/**
 * This Exception is thrown from Form::validate method when at least one of the
 * inputs don't pass the test
 * @author 
 **/
class FormException extends Exception
{
    private $messages ;

    public function __construct($message=null) {
        if(is_array($message)){
            $this->messages = $message ;
        }elseif($message){
            $this->messages = array($message);    
        }
    }

    public function addMessage($msg) {
        $this->messages[] = $msg ;
    }

    public function getMessages() {
        return $this->messages ;
    } 

} // END class 
?>