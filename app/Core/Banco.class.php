<?php

namespace Core;

class Banco
{    
    static public function conectar()
    {
        $conexao = new \PDO(
            'mysql:host=localhost;dbname=escola',
            'root',
            '123456'
        );
        $conexao->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
        
        return $conexao; 
    }
}