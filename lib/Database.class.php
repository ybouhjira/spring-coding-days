<?php
/**
 * Manages Database connection and queries
 * @author Youssef Bouhjira
 */

class Database extends PDO{

    /**
      * Constructor
      */
    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=scd" ;
        $user = 'root' ;
        $pass = 'password' ;
        parent::__construct($dsn, $user,$pass);
        $this->query("SET NAMES 'utf8'");
    }

    /**
      * returns the result of a query as an array of objects
      * @return array
      */
    public function fetchObjects($query){
        $statement = $this->query($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
      * This function inserts row into tables
      * data should provided as associative arrays 
      * with the column names as keys
      */
    public function insert($table,$values){
        // Building the query from the array
        $count = count($values);
        $columns = implode(',',array_keys($values));
        $placeholders = implode(',', array_fill(0,$count,'?'));        
        $query = "INSERT INTO $table($columns) VALUES($placeholders)";
        
        // execcuting the query
        $statement = $this->prepare($query);
        $rows = array_slice(func_get_args(), 1);
        foreach ($rows as $tuple)
            if(!$statement->execute(array_values($tuple)) )
                return false;
        return true;
    }

    /**
      * Returns the values in a column as an array
      */
    public function fetchCol($column, $table, $distinct=false){
        $dist = ($distinct)? 'DISTINCT':'';
        $statment = $this->query("SELECT $dist $column FROM $table ");
        $result = array();
        while ($cell = $statment->fetchColumn(0))
            array_push($result, $cell);
        return $result;
    }
}

?>
