<?php
require_once 'Input.class.php';
/**
 * This class allows us to check the validity uploaded files
 * @author Youssef Bouhjira
 **/
class FileIn extends Input
{
// ATTRIBUTES
    /**
     * The max size in bytes
     * @var integer
     **/
    var $maxSize;

    /**
     * A regular expression matching the valid mime types for 
     * this file
     * @var string
     **/
    var $mimeType;
    
// METHODES

    /**
     * Constructor
     */
    public function __construct($maxSize, $mimeType, $name, $errorMessage="",
         $required=true)
    {
        parent::__construct($name,$errorMessage,$required);
        $this->maxSize = $maxSize;
        $this->mimeType = $mimeType;
    }

    /**
     * reimplemented from InputValidator::validate()
     * @return true on success & false otherwise
     **/
    public function validate($file) {
        $filename = $file['tmp_name'];
        if(filesize($filename) > $this->maxSize)
            return false;
        if(!preg_match($this->mimeType,mime_content_type($filename)))
            return false;
    
        return true;
    }

    // GETTERS AND SETTERS
    public function getMaxSize(){
        return $this->maxSize;
    }

    public function setMaxSize($maxSize){
        $this->maxSize = $maxSize;
    }

    public function getMimeType(){
        return $this->mimeType;
    }

    public function setMimeType($mimeType){
        $this->mimeType = $mimeType;
    }
    
} // END class RegexInputValidator 
?>
