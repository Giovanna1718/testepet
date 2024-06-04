<?php
//clienteDao.php

// Inclua o arquivo de conexão
include_once "config/conexao.php";
// Inclua o arquivo da classe Cliente
include_once "model/cliente.php";

class ClienteDao{
    public function create(Cliente $obj){
        try{
            //criando a conexao com o banco
            $banco = Conexao::conectar();
            //criando o comando SQL
            $sql = "INSERT INTO cliente(nome, telefone1, telefone2, email, senha, logradouro, cep, numero, cidade, estado, cpf) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            //Prepara o banco para execução
            $query = $banco->prepare($sql);
            //Executa o comando
            $query->execute([$obj->nome, $obj->telefone1, $obj->telefone2, $obj->email, $obj->senha, $obj->logradouro, $obj->cep, $obj->numero, $obj->cidade, $obj->estado, $obj->cpf]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            return false;
        }
    }

    public function readAll(){
        try{
            //conectando com o banco
            $banco = Conexao::conectar();
            //Consulta SQL
            $sql = "SELECT * FROM cliente ORDER BY nome";
            //Executar o comando e armazenar o resultado
            $resultado = $banco->query($sql);
            //Criando o array
            $lista = [];
            //percorrendo o resultado
            foreach($resultado as $linha){
                $lista[] = new Cliente($linha["idCliente"], $linha["nome"], $linha["telefone1"], $linha["telefone2"], $linha["email"], $linha["senha"], $linha["logradouro"], $linha["cep"], $linha["numero"], $linha["cidade"], $linha["estado"], $linha["cpf"]);
            } //fim foreach

            Conexao::desconectar();
            return $lista;
        }catch(PDOException $e){
            return null;
        }
    }
    
    public function readNome($nome){
        try {
            // Conectando com o banco
            $banco = Conexao::conectar();
            // Consulta SQL
            $sql = "SELECT idCliente, nome FROM cliente WHERE nome LIKE ? ORDER BY nome";
            // Preparar o comando
            $query = $banco->prepare($sql);
            $query->execute(["%$nome%"]);
            // Criando o array
            $lista = [];
            // Percorrendo o resultado
            while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = new Cliente($linha["idCliente"], $linha["nome"], null, null, null, null, null, null, null, null, null, null);
            }
    
            Conexao::desconectar();
            return $lista;
        } catch(PDOException $e) {
            return null;
        }
    }
    
    

    public function delete($id){
        try{
            $banco = Conexao::conectar();
            $sql = "DELETE FROM cliente WHERE idCliente = ?";
            $query = $banco->prepare($sql);
            $query->execute([$id]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function readId($id){
        try{
            $banco = Conexao::conectar();
            $sql = "SELECT * FROM cliente WHERE idCliente = ? ORDER BY nome";
            $query = $banco->prepare($sql);
            $query->execute([$id]);
            $lista = $query->fetch(PDO:FETCH_ASSOC);
            Conexao::desconectar();
            return $lista;
        }catch(PDOException $e){
            //echo $e->getMessage();
            return null;
        }
    }

    public function update(Cliente $obj){
        try{
            $banco = Conexao::conectar();
            $sql = "UPDATE cliente SET nome=?, telefone1=?, telefone2=?, email=?, senha=?, logradouro=?, cep=?, numero=?, cidade=?, estado=?, cpf=?
            WHERE idCliente=?";
            $query = $banco->prepare($sql);
            $query->execute([$obj->nome, $obj->telefone1, $obj->telefone2, $obj->email, $obj->senha, $obj->logradouro, $obj->cep, $obj->numero, $obj->cidade, $obj->estado, $obj->cpf, $obj->idCliente]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
