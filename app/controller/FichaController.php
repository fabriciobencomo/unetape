<?php

namespace controller;

use core\Controller;
use model\EStadoCivil;

class FichaController extends Controller 
{
    public function datosPersonales(){
        $title = "UNETALPET | Datos Personales";
        $estados = EStadoCivil::select_all(); 
        $this->print("datosPersonales", compact(["title","estados"]));
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
