<?php
class Funcionario{
    //Atributos da tabela funcionário
    private $idFuncionario;
    private $admin;
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
    
    public function __construct($idFuncionario, $admin, $nome, $telefone1, $telefone2, $email, $senha, $logradouro, $cep, $numero, $cidade, $estado, $cpf){
        $this->idFuncionario = $idFuncionario;
        $this->admin = $admin;
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

    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function getNome() {
        return $this->nome;
    }
}

?>