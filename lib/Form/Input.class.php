<?php 
/**
 * This is an abstract class for input validators
 * @author Youssef Bouhjira
 **/
abstract class Input
{
    /**
     * this is the value od the name attribut in the <input> HTML tag
     * @var string
     **/
    private $name;
    
    /**
     * This value indicates if the value is required
     * @var boolean
     **/
    private $required;

    /**
     * That's the error message
     *
     * @var string
     **/
    private $errorMessage;

    /**
     * Constructor 
     **/
    protected function __construct($name, $errorMessage="", $required=true) {
        $this->name = $name;
        $this->required = $required;
        $this->errorMessage = $errorMessage;
    } 

    /**
     * This abstract method should be implemented by child class to provide the
     * way to validate the input value
     * @return returns a boolean indicating if the value is valid 
     **/
    abstract public function validate($value) ;
    
    /**
     * name attribute getter
     **/
    public function getName() {
        return $this->name ;
    }

    /**
     * name attribute setter  
     **/
    public function setName($name) {
        $this->name($name) ;
    }

    /**
     * required attribute setter 
     **/
    public function setRequired($required) {
        $this->required = $required ;
    }

    /**
     * required attribute getter 
     **/
    public function isRequired() {
        return $this->required ;
    }

    /**
      * errorMessge getter
      */
    public function getErrorMesage(){
        return $this->errorMessage;
    }
    
    /**
      * errorMessge setter
      */
    public function setErrorMesage($errorMessage){
        $this->errorMessage = $errorMessage;
    }
    
} // END class 
?>