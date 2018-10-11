<?php

require_once('Departamento.php');

class Produto {
	private $idProdudo;
	private $nome;
	private $preco;
	private $departamento;

	public function __construct($id,$nome,$preco,$dep){
		$this->idProduto = $id;
		$this->nome = $nome;
		$this->preco = $preco;
		$this->departamento = $dep;
	}
	public function setProduto($id){
		$this->idProduto = $idProduto;
	}

	public function getProduto(){
		return $this->idProduto;
	}
	//////////////
	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}
////////////// 
	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getPreco(){
		return $this->preco;
	}
	/// Instanciar class produto
	public function setDepartamento($dep){
		if($dep instanceof Departamento){
			$this->departamento = $departamento;
		}
	}
	public function getDepartamento(){
		return $this->departamento;
	}
	public function __slepp(){
		return array_keys(get_object_vars($this));
	}
}

?>