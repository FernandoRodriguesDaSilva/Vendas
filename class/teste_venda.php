<?php 

require_once("Cliente.php");
require_once("Vendedor.php");
require_once("Departamento.php");
require_once("Produto.php");
require_once("Venda_produto.php");
require_once("Venda.php");
// Instancia de Departamentos
$depAlimentos = new Departamento(1,"Alimentos");
$depRoupas = new Departamento(2,"Roupas");
$depEletronicos = new Departamento(3,"Eletronicos");
$depRevistas = new Departamento(4,"Revistas");
// Instancia de Produtos
$prodNote = new Produto(1,"Notebook Dell",4999.99,$depEletronicos);
$prodInto = new Produto(2,"Revista InfoExame 2018",15.00,$depRevistas);
$prodPastel = new Produto(3,"Pastel da Feira",5.00,$depAlimentos);
$prodFeijao = new Produto(4,"Feijao",4.00,$depAlimentos);
$prodMouse = new Produto(5,"mouse",40.00,$depEletronicos);
// Instancias de Vendedores
$vendedorPedro = new Vendedor(1,"Pedro da Silva","Rua: Pedro Ronchim","1633436679",4000.00);
$vendedorOlga = new Vendedor(2,"Olga maria Barros","Rua dos buritis","334685874",5000.00);
// Instancias de Clientes
$clienteJonas = new Cliente(1,"Jonas da Silva Sauro","Rua Matogrosso, 500","115245886",200);
$clienteMarcelo = new Cliente(2,"Marcelo Ignacio","Rua da felicidades, 409","33438875",100);

// imprimir todos os valores 
$produtos = [$prodNote, $prodInto, $prodPastel, $prodFeijao, $prodMouse];

echo "<table>";

echo "<tr><td>Nome</td><td>ID</td><td>preco</td><td>Departamento</td><tr>";

foreach ($produtos as $p){
	echo "<tr>";
	echo "<td>". $p->getIdProduto(). "</td>";
	echo "<td>". $p->getNome(). "</td>";
	echo "<td>". $p->getPreco(). "</td>";
	echo "<td>". $p->getDepartamento()->getNome(). "</td>";
	echo "</tr>";
}
echo "</table>";

// Criando venda ($idVenda=null,$total=0,$cliente=null,$vendedor=null,$produtos=[])
$venda1 = new Venda(1,0,$clienteJonas,$vendedorPedro);
$venda2 = new Venda(2,0,$clienteMarcelo,$vendedorPedro);
$venda3 = new Venda(3,0,$clienteJonas,$vendedorPedro);
//addProdutos($vendaProduto) => class VendaProduto($pro,$qde,$desc)
$venda1->addProduto(new VendaProduto($prodMouse, 1, 0));
$venda1->addProduto(new VendaProduto($prodPastel, 2, 0.10));
$venda1->addProduto(new VendaProduto($prodFeijao, 5, 0.20));
$venda1->calculaTotal();

$venda2->addProduto(new VendaProduto($prodMouse, 4, 0));
$venda2->addProduto(new VendaProduto($prodNote, 2, 0.50));
$venda2->addProduto(new VendaProduto($prodFeijao, 10, 0.20));
$venda2->calculaTotal();

$venda3->addProduto(new VendaProduto($prodInto, 1, 0.80));
$venda3->addProduto(new VendaProduto($prodPastel, 6, 0.10));
$venda3->addProduto(new VendaProduto($prodFeijao, 5, 0.20));
$venda3->calculaTotal();

// Array pra imprimir todas as vendas 

$vendas = [$venda1,$venda2,$venda3];

function imprimirVendas($vendas){
	echo "<hr>";
	echo "<h3>Vendas</h3>";
	echo "<hr>";
	foreach ($vendas as $v) {
		echo "<P>ID da venda: ". $v->getIdVenda()."</p>";
		echo "<p> Nome do Vendedor: " . $v->getVendedor()->getNome() ."</p>";
		echo "<p> Nome do Cliente: " . $v->getCliente()->getNome() ."</p>";
		echo "<table>";

		echo "<hr><br>";
// foreach para venda dos produtos
			// ID / Nome / Quantidade / Departamento / Desconto / Total
		echo "<tr><td>ID</td><td>Nome</td><td>Quantidade</td><td>Departamento do produtos</td><td>Desconto</td><td>Total</td></tr>";
		foreach ($v->getProdutos() as $vendaproduto){
			echo "<tr>";         // class Venda_produto    // class Produto
			echo "<td>". $vendaproduto->getProduto()->getIdProduto() ."</td>";
			echo "<td>". $vendaproduto->getProduto()->getNome()."</td>";
			echo "<td>". $vendaproduto->getQuantidade() ."</td>";
			echo "<td>". $vendaproduto->getProduto()->getDepartamento()->getNome()."</td>";
			echo "<td>". $vendaproduto->getDesconto() ."</td>";
			$total_produto_com_desconto = ($vendaproduto->getProduto()->getPreco() * $vendaproduto->getQuantidade())  * (1 - $vendaproduto->getDesconto());
			echo "<td> R$ ".$total_produto_com_desconto. "</td>";
			echo "</tr>";
		} 
		echo "</table>";
		echo "<h4>Total da Venda: ". $v->getTotal() . "</h4>";
		echo "<hr><br>";
	}
}

imprimirVendas($vendas);