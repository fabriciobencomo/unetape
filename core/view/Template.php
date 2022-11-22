<?php

namespace core\view;

use core\Config;

class Template
{
    public $folder = null;
    public $extention = null;
    public $name = null;
    public $content = null;

    static public function uncached()
    {
        $meta = "";
        $meta .= "<meta http-equiv='Expires' content='0'>";
        $meta .= "<meta http-equiv='Last-Modified' content='0'>";
        $meta .= "<meta http-equiv='Cache-Control' content='no-cache, mustrevalidate'>";
        $meta .= "<meta http-equiv='Pragma' content='no-cache'>";
        echo $meta;
    }

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function render($__params__ = array())
    {
        $__content__ = "";

        ob_start();

        $this->require_file($__params__);

        $__content__ = ob_get_contents();

        ob_end_clean();

        return trim($__content__);
    }

    private function require_file($__data__ = array())
    {
        extract($__data__);

        $__template__ = $this->folder . $this->name . "." . $this->extention;

        if (!file_exists($__template__)) {
            throw new \Exception("El template - {$__template__} - no se encuentra", 1);
            return false;
        }

        require $__template__;
    }
}
