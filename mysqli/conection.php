<?php

$user = 'localhost';
$host = 'root';
$pass = 'root';
$db = 'aula_bd';

$mysqli = new mysqli($user,$host,$pass,$db);

if (!$mysqli->connect_errno){
	echo "conexao ativa, tudo OK !!";

	}else {
	echo "Erro de conexao";
}