<?php

class AppController extends Controller{

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