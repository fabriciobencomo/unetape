<?php

namespace core;

use core\view\Section;

class View
{
    static public $folder = null;
    static public $extention = null;
    static public $sections = array();
    static public $template = null;

    static public function create($folder = null, $extention = null)
    {
        static::$folder = $folder;
        static::$extention = $extention;

        return static::class;
    }

    static public function vextends($name){
        static::$template->name = $name;
    }

    static public function osection($name)
    {
        $section = new Section($name);
        static::$sections[$name] = $section;
        static::$sections[$name]->open();
    }

    static public function csection()
    {
        Section::close();
    }

    static public function printByName($name)
    {
        $section = "";

        if (isset(static::$sections[$name])) {
            $section = static::$sections[$name]->content;
        }

        echo $section;
    }

    static public function vinsert($view, $__params__ = array()){
        static::require_file($view, $__params__);
    }

    static public function render($__view__, $__params__ = array())
    {
        $__content__ = "";

        ob_start();

        static::require_file($__view__, $__params__);

        if (static::$template->name) {
            echo static::$template->render($__params__);
        }

        $__content__ = ob_get_contents();

        ob_end_clean();

        return trim($__content__);
    }

    static private function require_file($__view__, $__data__ = array()){
        extract($__data__);

        $__view__ = static::$folder . $__view__ . "." . static::$extention;

        if (!file_exists($__view__)) {
            throw new \Exception("La vista - {$__view__} - no existe.", 1);
            return false;
        }

        require $__view__;
    }
}
