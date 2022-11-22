<?php

namespace core;

use core\view\Template;

class Config 
{
    static public $current = null;
    static public $configs = array();

    static public function create($current = null, $params = array()){
        if(!isset(static::$configs[$current])){
            static::$current = $current;
            static::$configs[$current] = array();
        }

        return static::class;
    }

    static function current($current = null){
        static::$current = $current;
        return static::class;
    }

    static public function add($params = array()){
        if(!static::$current) return static::class;

        switch (func_num_args()) {
            case '1':
                foreach (func_get_arg(0) as $key => $value) {
                    static::add($key, $value);
                }

                break;

            case '2':
                list($key, $value) = func_get_args();

                static::$configs[static::$current][$key] = $value;

                break;
        }

        return static::class;
    }

    static public function get($key = null){
        if(!static::$current) return null;

        $current = static::$current;

        return (isset(static::$configs[$current][$key]))
            ? static::$configs[$current][$key]
            : null;
    }

    static public function all(){
        if(!static::$current) return array();

        $current = static::$current;

        return (isset(static::$configs[$current]))
            ? static::$configs[$current]
            : null;
    }
    

    static public function initialize($app){
        Config::current("view");

        View::$folder = Config::get("folder");
        View::$extention = Config::get("extention");

        Config::current("template");

        $template = new Template;
        $template->folder = Config::get("folder");
        $template->extention = Config::get("extention");

        View::$template = $template;

        Config::current("database");

        DataBase::$config_params = Config::all();

        Config::current("session");

        Session::$name = Config::get("name");
        
        Config::current(null);
    }
}
