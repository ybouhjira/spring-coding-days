<?php
require_once 'Input.class.php';
/**
 * This class allows us to check the validity of a date input according to the 
 * date format we set
 * @author Youssef Bouhjira
 **/
class DateIn extends Input
{
// ATTRIBUTES

    /**
     * The minimum value for the date
     * @var string
     **/
    var $minDate;

    /**
     * The maximum value for the date
     * @var string
     **/
    var $maxDate;

// METHODES
    /**
     * Constructor
     * @param minDate (string) : the minimum date in the format $format
     * @param maxDate (string) : the maximum date in the format $format
     **/
    public function __construct( $minDate, $maxDate, $name, $errorMessage="",
        $required=true ) 
    {
        // name & required
        parent::__construct($name, $errorMessage, $required);
        // minDate
        if(self::isValidDate($minDate))
            $this->minDate = $minDate ;
        else
            die("Invalid date : $minDate");
        // maxDate
        if(self::isValidDate($maxDate))
            $this->maxDate = $maxDate;
        else
            die("Invalid date : $maxDate");

        // check that minDate <= maxDate
        if(!self::compare($minDate,$maxDate))
            die("Error: $minDate > $maxDate ");
    }

    /**
     * reimplemented from InputValidator::validate()
     * @return true on success & false otherwise
     **/
    public function validate($date)
    {
        if(self::isValidDate($date)){
            $minValid = self::compare($this->minDate,$date) ;
            $maxValid = self::compare($date, $this->maxDate) ;  
            return  $minValid && $maxValid ;
        } 
        return false;
    }

    /**
     * Checks if a date string is valid
     * @return boolean
     **/
    static private function isValidDate($date)
    {
        $p='/^(0?[1-9]|[12][0-9]|3[01])([.\/-])(0?[1-9]|1[012])\2(19|20)\d\d$/';
        if(preg_match($p, $date)){
            $dateArray = preg_split('/[.\/-]/', $date);
            return checkdate($dateArray[1],$dateArray[0],$dateArray[2]);
        }else{
            return false;
        }
    }

    /**
     * Checks that $min < $max
     * @return boolean
     **/
    static private function compare($min,$max)
    {
        $minDate = preg_split('/[.\/-]/',$min);
        $maxDate = preg_split('/[.\/-]/',$max);
        
        // Convert to interger
        foreach ($minDate as $key => $value) {
            $minDate[$key] = (int) $value; 
        }
        foreach ($maxDate as $key => $value) {
            $maxDate[$key] = (int) $value; 
        }
        
        // compare years
        if($maxDate[2] > $minDate[2])
            return true;
        elseif($minDate[2] > $maxDate[2])
            return false;
        // compare months
        if($maxDate[1] > $minDate[1])
            return true;
        elseif($minDate[1] > $maxDate[1])
            return false;
        // compare days
        if($maxDate[0] > $minDate[0])
            return true;
        elseif($minDate[0] > $maxDate[0])
            return false;

        return true;
    }

// GETTERS AND SETTERS

    public function getMinDate(){
        return $this->minDate;
    }

    public function setMinDate($minDate){
        if(self::isValidDate($minDate) &&self::compare($minDate,$this->maxDate))
            $this->minDate = $minDate;
        else
            die('$minDate is invalid');
    }

    public function getMaxDate(){
        return $this->maxDate;
    }

    public function setMaxDate($maxDate){
        if(self::isValidDate($maxDate) &&self::compare($this->minDate,maxDate))
            $this->maxDate = $maxDate;
        else
            die('$maxDate is invalid');
    }


} // END class DateInputValidator 
?>