<?php

class AppModel extends Database
{

    function getList()
    {
        $con = $this->connect();
        $sql = "SELECT * FROM dbname";
        $sth = $con->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
}