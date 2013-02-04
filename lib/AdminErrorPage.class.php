<?php
/**
 * This page is used to display a nice & fiendly error Message to the 
 * Administrator when something bad happens
 * @author Youssef Bouhjira
 **/
require_once 'config.php';
require_once 'SmartySetup.class.php';
class AdminErrorPage
{

    /**
     * The message to be displayed
     * @var string
     **/
    var $message;

    /**
     * Constructor
     **/
    public function __construct($message="")
    {
        if($message == ""){
            $message = "Une erreur technique est survenue.";
        }
        $this->message = $message ;
    }

    /**
     * cleans all outputed text and displays the error Message
     **/
    public function display()
    {
        $smarty = new SmartySetup();
        $smarty->assign('errorMessage',$this->message);
        ob_end_clean(); //< clean previously echoed text
        $smarty->display(SITEDIR.'/web/tpl/admin_error.tpl');
        die();
    }

    // GETTERS AND SETTERS
    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }
} // END class 
?>
