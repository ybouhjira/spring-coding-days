<?php
/**
 * This page is used to display a nice & fiendly error Message to the 
 * Administrator when something bad happens
 * @author Youssef Bouhjira
 **/
require_once 'config.php';
require_once 'SmartySetup.class.php';

class MessagePage
{

    /**
     * The message to be displayed
     * @var string
     **/
    private $message;
    
    /**
     * The template to be displayed
     * @var string
     */
    private $template;

    /**
     * The css classs
     * @var string
     */
    private $cssClass;

    /**
     * Constructor
     **/
    public function __construct($tpl = "{SITEDIR}web/tpl/admin_error.tpl",
        $message="Une erreur technique est survenue.", $cssClass="error")
    {
        $this->message = $message ;
        $this->template = $tpl;
        $this->cssClass = $cssClass ;
    }

    /**
     * cleans all outputed text and displays the error Message
     **/
    public function display()
    {
        $smarty = new SmartySetup();
        $smarty->assign('errorMessage',$this->message);
        $smarty->assign('cssclass',$this->cssClass);
        ob_end_clean(); //< clean previously echoed text
        $smarty->display($this->template);
        die();
    }

    // GETTERS AND SETTERS
    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function setTemplate($tpl) {
        $this->template = $tpl;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function getCssClass() {
        return $this->cssClass;
    }

    public function setCssClass($cssClass) {
        $this->cssClass = $cssClass ;
    }
} // END class 
?>
