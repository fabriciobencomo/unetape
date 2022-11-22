<?php

use core\Router;
use controller\IndexController as Index;
use controller\SessionController as Session;
use controller\FichaController as Ficha;

// Router::get("/", array("ClassController", "action"))->alias("name");
// Router::get("/", function () {
//     # code...
// });

Router::get("/", array(Index::class, "index"))->alias("index");
Router::get("/registro/", array(Session::class, "registro"))->alias("registro");
Router::get("/login/", array(Session::class, "login"))->alias("login");
Router::post("/auth/", array(Session::class, "auth"))->alias("auth");
Router::get("/logout/", array(Session::class, "logout"))->alias("logout");

Router::get("/datos/personales/", array(Ficha::class, "datosPersonales"))->alias("datosPersonales");
Router::get("/datos/formacion/academica/", array(Ficha::class, "formacionAcademica"))->alias("formacionAcademica");
Router::get("/datos/empleos/previos/", array(Ficha::class, "empleosPrevios"))->alias("empleosPrevios");
