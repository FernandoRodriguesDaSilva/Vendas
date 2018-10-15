<?php 

require_once ('Pessoa.php');

class Vendedor extends Pessoa {
	private $salario;

	public function __construct($id=null,$nome="",$end="",$tel="",$salario=0){
		parent::__construct($id,$nome,$end,$tel);
		$this->salario = $salario;
	}

	public function setSalario($salario){
		$this->salario = $salario;
	}
	public function getSalario (){
		return $this->salario;
	}
}