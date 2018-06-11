<?php

class AppController extends Controller{

    public function home(){
        $this->view('app/home');
    }

    public function error(){
        $this->view('app/error');
    }
}