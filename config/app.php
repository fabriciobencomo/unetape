<?php

$mode = "dev";

if ($mode == "dev") {
    ini_set("display_startup_errors", 1);
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}

if ($mode == "prod") {
    ini_set("display_startup_errors", 0);
    ini_set("display_errors", 0);
    error_reporting(0);
}

date_default_timezone_set("America/Caracas");

/* Establecemos que las paginas no pueden ser cacheadas */
// header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

// ini_set("session.use_strict_mode", 1);
// ini_set("session.use-only-cookies", 1);
// ini_set("session.use_cookies", 0);
// ini_set("session.use_trans_sid", 1);
