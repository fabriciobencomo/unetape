<?php

namespace controller;

use core\Controller;

class FichaController extends Controller 
{
    public function datosPersonales(){
        $title = "UNETALPET | Datos Personales";
        $this->print("datosPersonales", compact("title"));
    }

    public function formacionAcademica(){
        $title = "UNETALPET | Formación Academica";
        $this->print("formacionAcademica", compact("title"));
    }

    public function empleosPrevios(){
        $title = "UNETALPET | Empleos Previos";
        $this->print("empleosPrevios", compact("title"));
    }
}
