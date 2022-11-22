<?php

namespace core\view;

class Section
{
    public $name;
    public $content;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function open(){
        ob_start(array($this, "scontent"));
    }

    private function scontent($buffer){
        $this->content = trim($buffer);
    }

    static public function close(){
        ob_end_clean();
    }
}
