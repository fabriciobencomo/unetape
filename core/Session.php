<?php

namespace core;

class Session
{
    static public $name = null;

    static public function create()
    {
        static::start();

        $bool = 0;

        if (!isset($_SESSION['_NAME_'])) $bool = 1;
        if (!isset($_SESSION['_ID_'])) $bool = 1;
        if (!isset($_SESSION['_STARTED_'])) $bool = 1;

        if ($bool == 1) {
            session_regenerate_id(true);

            $_SESSION['_NAME_'] = session_name();
            $_SESSION['_ID_'] = session_id();
            $_SESSION['_STARTED_'] = PHP_SESSION_ACTIVE;
            $_SESSION['_DATA_'] = array();
        }

        return static::class;
    }

    static public function start(){
        if (session_status() == PHP_SESSION_NONE) {
            $name = md5(static::$name);

            session_name($name);

            if (empty(session_id())) {
                $id = (isset($_COOKIE[session_name()]))
                    ? $_COOKIE[session_name()]
                    : session_create_id();

                session_id($id);
            }

            session_start();
        }

        return static::class;
    }

    static public function created()
    {
        static::start();

        if (session_status() === PHP_SESSION_ACTIVE) {
            $bool = 0;

            if (!isset($_SESSION['_NAME_'])) $bool = 1;
            if (!isset($_SESSION['_ID_'])) $bool = 1;
            if (!isset($_SESSION['_STARTED_'])) $bool = 1;

            if ($bool == 0) {
                if ($_SESSION['_NAME_'] !== session_name()) $bool = 1;
                if ($_SESSION['_ID_'] !== session_id()) $bool = 1;
                if ($_SESSION['_STARTED_'] !== PHP_SESSION_ACTIVE) $bool = 1;
            }

            return $bool ? false : true;
        }

        return false;
    }

    static public function add()
    {
        if (!static::created()) return static::class;

        switch (func_num_args()) {
            case '1':
                foreach (func_get_arg(0) as $key => $value) {
                    static::add($key, $value);
                }

                break;

            case '2':
                list($key, $value) = func_get_args();

                $_SESSION['_DATA_'][$key] = $value;

                break;
        }

        return static::class;
    }

    static public function get($key)
    {
        if (!static::created()) return null;

        return (isset($_SESSION['_DATA_'][$key]))
            ? $_SESSION['_DATA_'][$key]
            : null;
    }

    static public function set($key, $value)
    {
        if (!static::created()) return static::class;

        if (isset($_SESSION['_DATA_'][$key])) {
            $_SESSION['_DATA_'][$key] = $value;
        }

        return static::class;
    }

    static public function all()
    {
        if (!static::created()) return null;

        return $_SESSION['_DATA_'];
    }

    static public function check()
    {
        if (!static::created()) return null;

        switch (func_num_args()) {
            case '1':
                $error = 0;

                if (is_array(func_get_arg(0))) {
                    foreach (func_get_arg(0) as $key => $value) {
                        if (!static::check($key, $value)) {
                            $error = 1;
                        }
                    }
                }

                return $error ? false : true;

                break;

            case '2':
                list($key, $value) = func_get_args();

                if (isset($_SESSION['_DATA_'][$key])) {
                    return ($_SESSION['_DATA_'][$key] == $value);
                }

                break;

            default:

                return null;

                break;
        }
    }

    static public function del($key)
    {
        if (!static::created()) return static::class;

        unset($_SESSION['_DATA_'][$key]);

        return static::class;
    }

    static public function destroy()
    {
        if (!static::created()) return static::class;

        session_reset();
        session_unset();
        session_regenerate_id(true);
        session_destroy();

        return static::class;
    }
}
