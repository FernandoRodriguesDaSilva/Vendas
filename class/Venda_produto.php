<?php 

require_once('Produto.php');

class VendaProduto {
	private $produto;
	private $quantidade;
	private $desconto;

	public function __construct($prod,$quant,$desc){
		$this->produto = $prod;
		$this->quantidade = $quant;
		$this->desconto = $desc;
	}
	// Instanciando a class produto
	public function setProduto($prod){
		if($prod instanceof Produto){
			$this->produto = $prod;
		}
	}

	public function getProduto(){
		return $this->produto;
	}
	/////
	public function setQuantidade($quant){
		$this->quantidade = $quant;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	///
	public function setDesconto($desc){
		$this->desconto = $desc;
	}
	public function getDesconto(){
		return $this->desconto;
	}

	public function __sleep(){
		return array_keys(get_object_vars($this));
	}
}

?>