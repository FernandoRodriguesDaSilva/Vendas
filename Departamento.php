<?php 

class Departamento {
	private $idDepartamento;
	private $nome;

	public function __construtct($idDepartamento, $nome){
		$this->idDepartamento = $id;
		$this->nome = $nome;
	}
	public function setIdDepartamento($id){
		$this->idDepartamento = $id;
	}

	public function getIdDepartamento(){
		return $this->idDepartamento;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function __sleep(){
		return array_keys(get_object_vars($this));
	}
}

?>