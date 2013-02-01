<?php
require_once 'Input.class.php';
/**
 * This class allows us to check the validity of a input value using regular
 * expresions
 * @author Youssef Bouhjira
 **/
class PregIn extends Input
{

// STATIC METHODES
    /**
      * returns one of the predefined regular expressions
      */
    static public function exp($regexp, $maxlen='',$minlen=0){
        $params = '';
        switch ($regexp) {
            case 'ALPHA':
                $regexp = '[a-z]+';
                $params = 'i' ;
                break;
            case 'ALSPC':
                $regexp = '[a-z ]+';
                $params = 'i';
                break;
            case 'ALNUM':
                $regexp = '[a-z0-9]+';
                $params = 'i';
                break;
            case 'ALNUMSPC':
                $regexp = '[a-z0-9 ]+';
                $params = 'i';
                break;
            case 'TELNAT':
                $regexp = '0[1-9]([-. ]?[0-9]{2}){4}';
                break;
            case 'EMAIL':
                $regexp = '[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}';
                break;
            }
        return '/^(?=.{'.$minlen.','.$maxlen.'}$)'.$regexp.'$/'.$params ;
    }

// ATTRIBUTES
    /**
     * The regular expression used to validate this input
     * @var string
     **/
    var $regex;
    
// METHODES

    /**
     * Constructor
     */
    public function __construct($regex, $name, $errorMessage="", $required=true)
    {
        parent::__construct($name,$errorMessage,$required);
        $this->regex = $regex;
    }

    /**
     * reimplemented from InputValidator::validate()
     * @return true on success & false otherwise
     **/
    public function validate($value)
    {
        return preg_match($this->regex, $value);
    }

    // GETTERS AND SETTERS
    public function getRegex(){
        return $this->regex;
    }

    public function setRegex($regex){
        $this->regex = $regex;
    }
    
} // END class RegexInputValidator 
?>