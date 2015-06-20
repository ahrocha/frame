<?php

namespace Front\Controller;

use Core\View;
use Core\AbstractController;

class Professor extends AbstractController
{
    
    public function index($param = null)
    {
        
        new View(null, 'professor', 'index');
    }
}