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
 * Connect to a database
 *
 * @author nicolas
 */
class DatabaseManager {

    private $dbName;
    private $user;
    private $password;
    private $host;
    private $port;
    private $databaseObject;

    /**
     * Constructor
     * 
     * @param string $dbName name of the database
     * @param string $user login of the user to connect to the database
     * @param string $password password of the user to connect to the database
     * @param string $host host of the database. Default localhost
     * @param string $port port to connect to the database. Default 3306
     */
    public function __construct($dbName, $user, $password, $host = "localhost", $port = "3306") {
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;

        $this->connect();
    }

    /**
     * Connect to the database
     * 
     * @return boolean true if succeed connection, false otherwise
     */
    private function connect() {
        try {
            $this->databaseObject = new \PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbName, $this->user, $this->password);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function getDatabaseObject() {
        return $this->databaseObject;
    }
    
    /**
     * Execute a query
     * 
     * @param string $query
     */
    public function exec($query){
        $this->getDatabaseObject()->exec($query);
    }


}
