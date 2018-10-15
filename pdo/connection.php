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
}

catch (PDOException $e){
	echo "Erro: ". $e->getMessage();
}

?>