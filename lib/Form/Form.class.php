<?php 
/**
 * The form class
 * @author Youssef Bouhjira
 **/
require_once 'FormValidationException.class.php';

class Form
{
    /**
     * The HTTP method, the possible values are POST and GET
     * @var string
     **/
    private $method;
    /**
     * Contains the input validators
     * @var array
     **/
    private $inputValidators;

    /**
     * Constructor
     **/
    public function __construct($method='get') {
        $this->method = $method ;
        $this->inputValidators = array();
    }

    /**
     * method attribute getter
     **/
    public function getMethod() {
        return $this->method ;
    }

    /**
     * method attribute setter
     **/
    public function setMethod($method) {
        $this->method = $method ;
    }

    /**
     * Validates all the inputs if stopAtFirst is true the method throws 
     * an exception when it encouters the first error
     * @throws FormException
     **/
    public function validate($stopAtFirst=true) {

        $first = array_shift($this->inputValidators);
        $exception = new FormValidationException();
        // The array containing the submitted data
        $data;
        if($first instanceof FileIn)
            $data = $_FILES ;
        else
            $data = ($this->method=='post')? $_POST:$_GET ;
        
        // Check the first input
        if(empty($data[$first->getName()]) && $first->isRequired() ){
            $exception->addMessage($first->getName());
            if($stopAtFirst)
                throw $exception;
        }
        else if(!$first->validate($data[$first->getName()]) ){
            $exception->addMessage($first->getName());
            if($stopAtFirst)
                throw $exception;
        }

        // Check the other inputs
        foreach ($this->inputValidators as $name => $input) {
            if($input instanceof FileIn)
                $data = $_FILES ;
            else
                $data = ($this->method=='post')? $_POST:$_GET ;

            if(empty($data[$name]) && $input->isRequired())
                $exception->addMessage($input->getName());
            elseif(!$input->validate($data[$name]))
                $exception->addMessage($input->getName());
        }

        // If the FormException object contains any error messages throw it
        if(count($exception->getMessages()))
            throw $exception;
    }

    /**
     * Adds inputs to the Form
     * @param $input : a single input as paramter or a simple numerical array
     * of inputs
     **/
    public function addInput($input) {
        if(is_array($input)){
            $this->inputValidators = array_merge(
                array_combine(array_map('Form::mapInputToName',$input), $input),
                $this->inputValidators
            );
        }
            
        else{
            $this->inputValidators[$input->getName()] = $input ;
        }
            
    }

    /**
     * Remove an Input from the Form
     **/
    public function removeInput($name) {
        unset($this->inputValidators[$name]);
    }

    /**
     * Returns the Input
     **/
    public function getInput($name) {
        return $this->inputValidators[$name];
    }

    // PRIVATE METHODES
    /**
     * Returns the name of the input
     */
    static private function mapInputToName($input){
        return $input->getName();
    }
} // END class 
?>
