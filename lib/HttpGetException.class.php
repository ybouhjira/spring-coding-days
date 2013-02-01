<?php
/**
 * An exception class to throw it when GET arguments are invalide
 * @author Youssef Bouhjira
 */

class HttpGetException extends Exception {

    public function __construct($msg=''){
        parent::__construct($msg);
    }

} //< END OF CLASS

?>