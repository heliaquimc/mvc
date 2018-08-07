<?php

class AppController extends Controller{

    function home(){
        if(!empty($_SESSION['userId'])){
            $this->view('app/home');
        }
        $this->view('app/login', [], false);
    }

    function error(){
        $this->view('app/error');
    }
}