<?php 

include_once('Venda_produto.php');

class Venda{
	private $idVenda;
	private $total;
	private $cliente;
	private $vendedor;
	private $produtos;

	public function __construct($idVenda=null,$total=0,$cliente=null,$vendedor=null,$produtos=[]){
		$this->idVenda = $idVenda;
		$this->total = $total;
		$this->cliente = $cliente;
		$this->vendedor = $vendedor;
		$this->produtos = $produtos;
	}

	public function setIdVenda($idvenda){
		$this->idVenda = $idvenda;
	}

	public function getIdVenda(){
		return $this->idVenda;
	}

	public function setTotal($total){
		$this->total = $total;
	}

	public function gettotal(){
		return $this->total;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function setVendedor($vendedor){
		$this->vendedor = $vendedor;
	}

	public function getVendedor(){
		return $this->vendedor;
	}

	public function addProduto($vendaProd){
		if($vendaProd instanceof VendaProduto){
			$this->produtos[] = $vendaProd;
		}
	}

	public function getProdutos(){
		return $this->produtos;
	}
	// Calcula o total de cada venda
	public function calculaTotal(){
		$total = 0;
		foreach ($this->produtos as $p) {
			$total +=$p->getProduto()->getPreco() * $p->getQuantidade() * (1 - $p->getDesconto());
		}
		$this->total = $total;
	}
}

?>