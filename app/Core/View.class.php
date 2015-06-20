<?php

namespace Core;

class View
{
    public function __construct($dados=null, $controller='home', $method='index')
    {
        $tpl = "Front/View/$controller/$method";
        
        # require do topo
        require_once __DIR__ . "/../Front/View/layout/_topo.phtml";
        
        # require do corpo
        require_once __DIR__ . "/../$tpl.phtml";
        
        # require rodape
        require_once __DIR__ . "/../Front/View/layout/_rodape.phtml";
    }
}