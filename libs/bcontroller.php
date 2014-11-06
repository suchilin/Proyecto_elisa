<?php

class bController {

    var $view;
    var $model;

    function __construct($method, $param1 = '', $param2 = '') {
        $this->handler($method, $param1, $param2);
    }

    private function handler($method, $param1, $param2) {
        if (is_callable(array($this, $method))) {
            if ($param1 != '') {
                $this->$method($param1);
            }else{
                $this->$method();
            }
        } else {
            $this->index(); //or some kind of error message
        }
    }

    private function error() {
        echo "el metodo no existe";
    }

}
