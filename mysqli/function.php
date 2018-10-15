<?php
// Função cabeçalho que cria uma lista 
function echoTableHead(){
	echo "<br>";
	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<td>ID Aluno</td>";
	echo "<td>Nome</td>";
	echo "<td>Idade</td>";
	echo "<td>Cidade</td>";
	echo "</tr>";
}

// Função que criar um footer para uma lista
function echoTableFoot(){
	echo "</table>";
	echo "<hr>";
	echo "<br>";
}


?>