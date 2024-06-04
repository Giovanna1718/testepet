<?php
class Cliente{
    //Atributos da tabela cliente
    private $idCliente;
    private $nome;
    private $telefone1;
    private $telefone2;
    private $email;
    private $senha;
    private $logradouro;
    private $cep;
    private $numero;
    private $cidade;
    private $estado;
    private $cpf;
    
    public function __construct($idCliente, $nome, $telefone1, $telefone2, $email, $senha, $logradouro, $cep, $numero, $cidade, $estado, $cpf){
        $this->idCliente = $idCliente;
        $this->nome = $nome;
        $this->telefone1 = $telefone1;
        $this->telefone2 = $telefone2;
        $this->email = $email;
        $this->senha = $senha;
        $this->logradouro = $logradouro;
        $this->cep = $cep;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cpf = $cpf;
    }

    public function __get($key){
        return $this->{$key};
    }

    public function __set($key, $value){
        $this->{$key} = $value;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getNome() {
        return $this->nome;
    }
}
?>