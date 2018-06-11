<?php

class AppModel extends Model{

    function example($id){
        $con = $this->getCon();
        $sql = "SELECT * FROM table where id = ?";
        $res = $con->prepare($sql);
        $res->execute(array($id));
    }
}