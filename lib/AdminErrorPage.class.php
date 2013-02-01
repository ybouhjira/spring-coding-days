<?php
/**
 * This page is used to display a nice & fiendly error Message to the Administrator
 * when something bad happens
 * @author Youssef Bouhjira
 **/
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
            $message = "Une erreur technique est survenue, ";
            $message .= "veuillez contactez le webmaster.";
            $message .= "<strong>e-mail : </strong>";
            $message .= "<a href='mailto:b.youssef91@gmail.com'";
            $message .= " class='btn btn-danger'>";
            $message .= 'b.youssef91@gmail.com </a>' ;
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