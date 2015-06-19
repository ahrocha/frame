<?php

namespace Front\Model;
use Core\AbstractModel;

class Aluno extends AbstractModel
{
	
	public $tabela = "alunos";
	
	public $campos = array(
		'aluno_id' => null,
		'nome' => null,
		'email' => null,
		'senha' => null,
	    'turma_id' => null	
    );
}