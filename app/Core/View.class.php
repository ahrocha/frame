<?php

namespace Core;

class View
{
    public function __construct($dados=null, $controller='home', $method='index', $error=null)
    {
        $tpl = "Front/View/$controller/$method";
        
        # require do topo
        require_once __DIR__ . "/../Front/View/layout/_topo.phtml";
        
        require_once __DIR__ . "/../$tpl.phtml";
        
        # require rodape
        require_once __DIR__ . "/../Front/View/layout/_rodape.phtml";
    }
    
    static public function error()
    {
        # require do topo
        require_once __DIR__ . "/../Front/View/layout/_topo.phtml";
            require_once __DIR__ . "/../Front/View/layout/_error.phtml";
        require_once __DIR__ . "/../Front/View/layout/_rodape.phtml";
    }
}