<?php

namespace Core;

class DataMapper
{
	private $conexao;
	
	
	public function __construct()
	{
		$this->conexao = Banco::conectar();
	}
	
	public function findOne($objeto, $onde)
	{
		$query = "SELECT * FROM $objeto WHERE $onde";
		
		$state = $this->conexao->query($query);
		
		return $state->fetchObject(get_class($objeto));
	}
	
	public function logon($objeto)
	{
		foreach ($objeto->getValues() as $chave => $valor){
		$onde[] = "$chave='$valor'";
			
		}
		$onde = implode(' AND ', $onde);
		
		$query = "SELECT * FROM $objeto WHERE $onde";
		
		return $this->conexao->query($query)->fetchObject(get_class($objeto));
		
		
	
	}
	
	public function findAll($objeto, $onde=null, $filtro=null)
	{
		$sql = "SELECT * FROM $objeto";
		if(!is_null($onde)){
			$sql .= " WHERE $onde";
		}
		
		if(!is_null($filtro)){
			$sql .= " LIKE '%$filtro%'";
		}
		return $this->conexao
		->query($sql)
		->fetchAll(\PDO::FETCH_CLASS, get_class($objeto));
		
	}
	
	public function insert($objeto)
	{
	    $campos = array_keys($objeto->getValues());
	    $valores = array_values($objeto->getValues());
	    
	    for($i=0; $i<count($valores); $i++){
	        $int[] = '?';
	    }
	    
	    $int = implode(',', $int);
	    $campos = implode(",", $campos);
	    
	    $sql = "INSERT INTO $objeto($campos) VALUES($int)";
	    
	    $state = $this->conexao->prepare($sql);
	    return $state->execute($valores);
	}
	
	public function update($objeto, $onde)
	{
	    foreach($objeto->getValues() as $campo => $valor){
	        $campos [] = "$campo=?";
	        $valores []= $valores;
	    }
	    
	    $campos = implode(',', $campos);
	    
	    $sql = "UPDATE $objeto SET $campos WHERE $onde";
	    
	    return $this->conexao->prepare($sql)->execute($valores);
	}
}




