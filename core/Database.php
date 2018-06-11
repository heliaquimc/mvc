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
        $config = parse_ini_file("../conf/conf.ini", true);
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
    }
    function connect(){
        return new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user,$this->password);
    }
}