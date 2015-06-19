<?php

namespace Core;

class App
{
    protected $controller;
    protected $method = 'index';
    
    public function __construct()
    {
        $controller = isset($_GET['controller']) ? 
                      ucfirst($_GET['controller']) :
                      'Home';
        $method = isset($_GET['method']) ?
                  $_GET['method'] :
                  'index';
        
        $this->controller = "Front\\Controller\\$controller";
        
        if(class_exists($this->controller)){
            $this->controller = new $this->controller();
            
            if(method_exists($this->controller, $method)){
                unset($_GET['method']);
                unset($_GET['controller']);
            }
        }
        
        if(is_object($this->controller)){
            $this->controller->$method($_GET);
        } else {
            View::error();
        }
    }
}