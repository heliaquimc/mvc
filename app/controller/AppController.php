<?php

class AppController extends Controller{

    function home(){
        $this->view('app/home');
    }

    function error(){
        $this->view('app/error');
    }
}