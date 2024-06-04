<?php
// Model Animal
class Animal{
    private $idAnimal;
    private $nome;
    private $peso;
    private $nascimento;
    private $cor;
    private $tipo;
    private $observacao;
    private $idCliente;
    
    public function __construct($idAnimal, $nome, $peso, $nascimento, $cor, $tipo, $observacao, $idCliente){
          $this->idAnimal = $idAnimal;
          $this->nome = $nome;
          $this->peso = $peso;
          $this->nascimento = $nascimento;
          $this->cor = $cor;
          $this->tipo = $tipo;
          $this->observacao = $observacao;
          $this->idCliente = $idCliente;
    }

    public function __get($key){
        return $this->{$key};
    }

    public function __set($key, $value){
        $this->{$key} = $value;
    }

    public function getIdAnimal() {
        return $this->idAnimal;
    }

    public function getNome() {
        return $this->nome;
    }
}

?>