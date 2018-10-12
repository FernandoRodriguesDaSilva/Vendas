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
//addProdutos($vendaProduto) => class VendaProduto($pro,$qde,$desc)
$venda1->addProdutos(new VendaProduto($prodMouse, 1, 0));
$venda1->addProdutos(new VendaProduto($prodPastel, 2, 0.10));
$venda1->addProdutos(new VendaProduto($prodFeijao, 5, 0.20));
// 



