<?php
// Model Visita
class Visita{
    private $idVisita;
    private $data;
    private $concluido;
    private $total;
    private $idAnimal;
    private $idCliente;
    private $idFuncionario;
    
    public function __construct($idVisita, $data, $concluido, $total, $idAnimal, $idCliente, $idFuncionario){
          $this->idVisita = $idVisita;
          $this->data = $data;
          $this->concluido = $concluido;
          $this->total = $total;
          $this->idAnimal = $idAnimal;
          $this->idCliente = $idCliente;
          $this->idFuncionario = $idFuncionario;
    }

    public function __get($key){
        return $this->{$key};
    }

    public function __set($key, $value){
        $this->{$key} = $value;
    }

}
?>