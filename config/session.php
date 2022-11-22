<?php

__config("session", array(
    "name" => "emece",
    "id" => session_id(),
    "lifetime" => 0,
    "path" => "/",
    "domain" => $_SERVER["HTTP_HOST"],
    "secure" => 1,
    "httponly" => 1,
    "samesite" => "Strict"
));
