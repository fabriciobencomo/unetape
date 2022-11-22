<?php

namespace controller;

use core\Controller;
use core\Session;

class SessionController extends Controller
{
    public function registro()
    {
        Session::destroy();
        $title = "UNETALPET | Registro";
        $this->print("registro", compact("title"));
    }

    public function login()
    {
        Session::destroy();
        $title = "UNETALPET | Login";
        $this->print("login", compact("title"));
    }

    public function auth()
    {
        $post = $_POST;

        $error = 0;

        if (!isset($post["user"]) || empty($post["user"])) $error = 1;
        if (!isset($post["pass"]) || empty($post["pass"])) $error = 1;

        if ($error) {
            $response = array(
                "error" => 1,
                "message" => "Usuario y Password Requerido."
            );
        } else {
            if ($post["user"] != "emece") $error = 1;
            if ($post["pass"] != "3m3c3") $error = 1;

            if ($error) {
                $response = array(
                    "error" => 1,
                    "message" => "Usuario y/o Password Invalido."
                );
            }else{
                Session::create();
                __redirect("install");
            }
        }

        $title = "UNETALPET | Login";
        $this->print("login", compact("title", "response"));
    }

    public function logout(){
        Session::destroy();
        __redirect("index");
    }
}
