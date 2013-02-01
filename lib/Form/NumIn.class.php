<?php
require_once 'Input.class.php';
/**
 * A class for checking sumbitted numerical values
 * @author Youssef Bouhjira
 **/
class NumIn extends Input
{

// ATTRIBUTS
    /**
     * The minimum value
     * @var float
     **/
    var $min;

    /**
     * The maximum value
     * @var float
     **/
    var $max;

    /**
     * Indicates that the number is an integer
     * @var boolean
     **/
    var $integer;
// METHODES

    /**
     * Constructor
     */
    public function __construct($min, $max, $name, 
        $errorMessage="", $integer=false, $required=true )
    {
        parent::__construct($name,$errorMessage,$required);
        $this->min = $min;
        $this->max = $max;
        $this->integer = $integer;
    }

    /**
     * reimplemented from InputValidator::validate()
     * @return true on success & false otherwise
     **/
    public function validate($num)
    {
        $val = (float)$num ;
        if($this->isInteger() && floor($val) != $val)
            return false;
        elseif($val < $this->getMin()  or $val > $this->getMax())
            return false;
        return true;
    }

    // getter and setters

    public function getMin (){
        return $this->min ;
    }

    public function setMin ($min ) {
        $this->min = $min ;
    }

    public function getMax (){
        return $this->max ;
    }

    public function setMax ($max ) {
        $this->max = $max ;
    }

    public function isInteger(){
        return $this->integer;
    }

    public function setInteger($integer){
        $this->integer = $integer;
    }
} // END class NumInput 
?>