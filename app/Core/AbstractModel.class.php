<?php

namespace Core;

abstract class AbstractModel
{
    protected $datamapper;

    public function __construct()
    {
        $this->datamapper = new DataMapper();
    }

    public function __set($atributo, $valor)
    {

        $this->campos[$atributo] = $valor;

    }

    public function __get($atributo)
    {

        return $this->campos[$atributo];

    }

    public function logar(Array $dados)
    {

        $this->campos = $dados;

        $aluno = $this->datamapper->logon($this);

        if ($aluno){
            	
            $this->createSession($aluno);
            	
            header("Location: consulta.php");
            	
        }else{
            return false;
        }

    }

    public function __call($metodo, $params)
    {
        $prefixo = substr($metodo, 0, 3);
        $atributo = strtolower(substr($metodo, 3));

        switch ($prefixo){
            case 'set':
                $this->campos[$atributo] = $params[0];
                break;
            case 'get':
                return $this->campos[$atributo];
                break;
        }
    }

    public function createSession($objeto)
    {
        $_SESSION['nome'] = $objeto->getNome();
        $_SESSION['email'] = $objeto->email;
    }

    public function getValues()
    {
        return $this->campos;
    }

    public function __toString()
    {
        return $this->tabela;

    }


    public function listar($onde=null, $filtro=null)
    {
        return $this->datamapper->findAll($this, $onde, $filtro);

    }

    public function save($post)
    {
        $this->campos = $post;
         
        if(!isset($this->campos['id'])){
            return $this->datamapper->insert($this);
        } else {
            $this->datamapper->update($this, "id={$this->getId()}");
        }
    }

    public function listarUm($onde)
    {
        return $this->datamapper->findOne($this, $onde);
    }
}