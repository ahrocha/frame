<?php

namespace Front\Model;
use Core\AbstractModel;

class Professor extends AbstractModel
{

	public $tabela = "professores";
	public $campoId = "prof_id";
	
	public $campos = array(
		'prof_id' => null,
		'nome' => null,
		'email' => null,
		'senha' => null,
	    'turma_id' => null	
    );
}