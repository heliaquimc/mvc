<?php

class AppController extends Controller{

    function __construct(){
        $this->model = new AppModel();
    }

    function home(){
        $this->view('app/home');
    }

    function test(){
        echo 'test text task';
    }

    function error(){
        $this->view('app/error');
    }
}