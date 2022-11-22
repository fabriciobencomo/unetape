<?php

namespace controller;

use core\Controller;
use model\User;

class UserController extends Controller 
{
    public function create(){
        $postUser = $_POST["usuario"];

        $columns = "epa";
        $values = "hola";
        
        $user = new User();

        $errores = $user->validar($postUser);

        if(empty($errores)){
            if($_REQUEST["method"] == "POST"){
                $user->insert($columns, $values);
                return header("location: ");
            }
        }else{
            header("location: ");
        }

    }

}
