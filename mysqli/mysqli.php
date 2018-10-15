<?php 

include_once('conection.php');
include_once('function.php');

// Inserindo dados no banco 
$sql = "INSERT INTO aluno (nome,idade,cidade) VALUES ('Fernando', 50, 'Texas')";
// Conferindo se fez inserção
if($mysqli->query($sql)){
	echo "<p> Registro inserido no banco com sucesso </p>";
}

// Atualizando Registro
$sql = "UPDATE aluno SET idade=idade+1 WHERE nome='Fernando'";
if($mysqli->query($sql)){
	echo "<p> Idade inserido no banco com sucesso </p>";
}

// Trazer todos os registros do banco de dados
$sql = "SELECT idaluno,nome,idade,cidade FROM aluno";
$resultado = $mysqli->query($sql);
if(isset($resultado)){
	echoTableHead();
	while ($r = $resultado->fetch_row()) {
		echo "<tr>";
		echo "<td>". $r[0] ."</td>";
		echo "<td>". $r[1] ."</td>";
		echo "<td>". $r[2] ."</td>";
		echo "<td>". $r[3] ."</td>";
		echo "</tr>";
	}
	echoTableFoot(); 
}

echo "<br><hr><br>";

// Entendendo function fetch_assoc

$sql = "SELECT * FROM aluno";
$resultado = $mysqli->query($sql);
if(isset($resultado)){
	// Saber o números de registros de uma determinada query
	echo "<p> Foram encontradas ". $resultado->num_rows . " registros.</p>";
	echoTableHead();
	while ($r = $resultado->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $r['idaluno'] ."</td>";
		echo "<td>". $r['nome'] ."</td>";
		echo "<td>". $r['idade'] ."</td>";
		echo "<td>". $r['cidade'] ."</td>";
		echo "</tr>";
	}
	echoTableFoot(); 
}

// Inserindo Registros com bind_param
// Associando um parametro para uma variavel 

$sql = "INSERT INTO aluno (nome,idade,cidade) VALUES (?,?,?)";
$stmt = $mysqli->prepare($sql);
// Se não acorreu nada de errado
if(isset($stmt)){
	// sis = "string, Int , string "
	$stmt->bind_param('sis',$nome,$idade,$cidade);
	$nome = "Adriana";
	$idade = 15;
	$cidade = "Mococa";
	$stmt->execute();

	$nome = "Carlos Madruga";
	$idade = 47;
	$cidade = "Mococa";
	$stmt->execute();


	$stmt->close();
}

// Delete utilizando bind_param

$sql = "DELETE FROM aluno WHERE nome='Fernando'";

if($mysqli->query($sql)){
	echo "Registros apagados com Sucesso ... ";
}


// Bucando Registro específico com stmt e bind_param

$sql = "SELECT idaluno, nome, idade, cidade FROM aluno WHERE cidade LIKE ?";

$stmt = $mysqli->prepare($sql);
if(isset($stmt)){
	$stmt->bind_param('s', $cidade);
	$cidade = "%Mococa%";
	$stmt->execute();
	$stmt->bind_result($idaluno, $nome,$idade,$cidade);
	$resultado = $stmt->store_result();

	if($stmt->num_rows){
		while ($stmt->fetch()){
			echo "<p>ID: $idaluno | Nome: $nome | Idade = $idade | Cidade = $cidade";
		}
	}
}








