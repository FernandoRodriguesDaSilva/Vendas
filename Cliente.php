<?php

require_once('Pessoa.php');

class Cliente extends Pessoa{
	private $pontosfidelidade;
	public function __construct($id=null,$nome="",$end="",$tel="",$pontos=0){
		parent::__construct($id,$nome,$end,$tel);
		$this->pontosfidelidade = $pontos;
	}

	public function setPontos($pontos){
		$this->pontosfidelidade = $pontos
	}

	public function getPontos(){
		return this->pontosfidelidade;
	}

}

?>