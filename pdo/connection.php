<?php 

$conectar = new PDO("mysql:dbname=aula_bd;host=localhost;charset=utf8mb4","root","root");
// Inserindo dados no banco

try {
	
	echo "<p>Conectado com banco utilizando PDO ... </p>";
	$sql = "SELECT * FROM aluno";
	$stmt = $conectar->prepare($sql);
	$stmt->execute();

	while ($row = $stmt->fetch()) {
		echo "<p>";
		echo $row['idaluno']. ', ';
		echo $row['nome']. ', ';
		echo $row['idade']. ', ';
		echo $row['cidade']. ', ';
		echo "</p>";
	}

// Usando outra maneira de inserir no banco 
	echo "<hr>";


	$alunos = [
		['nome'=>'Patrícia','idade'=>30,'cidade'=>'Fortaleza'],
		['nome'=>'Pablo','idade'=>10,'cidade'=>'Belo Horizonte']
	];

	$sql = "INSERT INTO aluno (nome,idade,cidade) VALUES (:nome, :idade, :cidade)";

	$stmt = $conectar->prepare($sql);
	foreach ($alunos as $a) {
		$stmt->execute($a);
	}

/// Obtendo todos os Registros Pablo
	echo "<p> Imprime todos os pablos </p>";
	$sql = "SELECT * FROM aluno WHERE nome = ?";
	$stmt = $conectar->prepare($sql);
	$stmt->execute(['Pablo']);
	while ($row = $stmt->fetch()) {
		echo "<p>";
		echo $row['idaluno']. ', ';
		echo $row['nome']. ', ';
		echo $row['idade']. ', ';
		echo $row['cidade']. ', ';
		echo "</p>";
	}





}



catch (PDOException $e){
	echo "Erro: ". $e->getMessage();
}

?>