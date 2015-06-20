<?php

namespace Front\Controller;

use Core\View;
use Core\AbstractController;

class Professor extends AbstractController
{
    
    public function index($param = null)
    {
        $professor = $this->get('Professor');
        $professor = $professor->listar();
        
        new View( $professor, 'professor', 'index');
    }
    
    public function edit($param = null)
    {
    	$prof_id = $param['prof_id'];
        $professor = $this->get('Professor');
        $professor = $professor->listarUm(" prof_id = $prof_id ");

        
        if ($_POST){
        	$dados = $_POST;
        	$dados['prof_id'] = $_GET['prof_id'];
        	print_r ($dados);
        	$professor->save($dados);
        	
        }
        
        new View( $professor, 'professor', 'edit');
    }
    
    public function insert($param = null)
    {

        $professor = $this->get('Professor');
        
        if ($_POST){
        	$dados = $_POST;
        	print_r ($dados);
        	$professor->save($dados);
        	$this->index();
        }

        new View( $professor, 'professor', 'insert');
        
    }
    
    public function delete($param = null)
    {

    	$prof_id = $param['prof_id'];
        $professor = $this->get('Professor');
        $professor = $professor->delete(" prof_id = $prof_id ");
        
        $professor = $this->get('Professor');
        $professor = $professor->listar();
        
        new View( $professor, 'professor', 'index');
    }
}