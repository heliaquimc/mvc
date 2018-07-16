<?php

class Database{
    /** @var string */
    private $host = null;

    /** @var string */
    private $dbname = null;

    /** @var string */
    private $user = null;

    /** @var string */
    private $password = null;

    function __construct(){
        $config = parse_ini_file("db.ini", true);
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }

    function connect(){
        $con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user,$this->password);
        $con->query("SET NAMES 'UTF8'");
        $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $con;
    }
}