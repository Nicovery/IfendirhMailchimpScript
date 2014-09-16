<?php

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Ifendirh\Database;
/**
 * Store the person data in database
 *
 * @author nicolas
 */
class Person {
    private $dbObject;
    
    /**
     * 
     * @param \Ifendirh\Database\DatabaseManager $dbObject
     */
    public function __construct($dbObject) {
        $this->dbObject = $dbObject;
    }
    
    public function insert($table,$data){
        $fields = array_keys($data);
        $query = "INSERT INTO `".$table."` ( id";
        
        foreach($fields as $field){
            $query .= ", ".$field;
        }
        
        $query .= ") VALUES (NULL";
        
        foreach($fields as $field){
            $query .= ", '".$data[$field]."'";
        }
        
        $query .= ")";
        
        echo $query;
        $this->dbObject->exec($query);
    }
}
