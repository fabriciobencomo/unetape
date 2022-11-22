<?php
namespace controller;

use core\Controller;

class IndexController extends Controller 
{
    public function index(){
        $title = "UNETALPET | Registro";
        $this->print("index", compact("title"));
    }
}
