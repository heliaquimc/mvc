<?php

class AppModel extends Database
{

    function getLista()
    {
        $con = $this->connect();
        $sql = "SELECT * FROM dbname";
        $sth = $con->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
}