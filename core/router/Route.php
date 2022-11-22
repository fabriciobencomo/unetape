<?php

namespace core\router;

class Route
{
    public $uri = null;
    public $controller = null;
    public $action = null;
    public $params = null;
    public $alias = null;

    public function __construct($query_preffix, $end_point)
    {
        switch (gettype($end_point)) {
            case 'string':
                list($object, $action) = $this->fromString($end_point);
                break;
            case 'array':
                list($object, $action) = $this->fromArray($end_point);
                break;
            case 'object':
                list($object, $action) = $this->fromObject($end_point);
                break;
            default:
                throw new \Exception("Invalid Argument to {$end_point} Request", 1);
                return null;
                break;
        }

        if ($object != "__FUNCTION__") {
            if (!class_exists($object)) {
                throw new \Exception("Class {$object} Not Found", 1);
                return null;
            }

            if (!is_callable(array($object, $action))) {
                throw new \Exception("Function {$action} of Class {$object} Not Found", 1);
                return null;
            };
        }

        $this->uri = $query_preffix;
        $this->controller = $object;
        $this->action = $action;
        $this->params = array();
    }

    private function fromString($end_point)
    {
        if (!preg_match("#^[\w\\\\]+@[\w_]+$#", $end_point) == 1) {
            throw new \Exception("Incorrect Format to {$end_point} Request", 1);
            return null;
        }

        return explode("@", $end_point);
    }

    private function fromArray($end_point)
    {
        if (count($end_point) != 2) {
            throw new \Exception("Incorrect Argument Array to {$end_point} Request", 1);
            return null;
        }

        return $end_point;
    }

    private function fromObject($end_point)
    {
        if (!is_callable($end_point)) {
            throw new \Exception("Incorrect Argument Function to {$end_point} Request", 1);
            return null;
        }

        return array("__FUNCTION__", $end_point);
    }

    public function alias($alias = "")
    {
        $this->alias = $alias;
        return $this;
    }

    public function query($params = "")
    {
        if ($this->uri == "/"){
            return "./" . (empty($params) ? "" : "?/" . $params);
        }

        return "./?" . $this->uri . $params;
    }
}
