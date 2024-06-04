<?php
//animalDao.php

// Inclua o arquivo de conexão
include_once "config/conexao.php";
// Inclua o arquivo da classe Cliente
include_once "model/animal.php";
class AnimalDao{
    public function create(Animal $obj){
        try{
            //criando a conexao com o banco
            $banco = Conexao::conectar();
            //criando o comando SQL
            $sql = "INSERT INTO animal (nome, peso, nascimento, cor, tipo, observacao, idCliente) 
                VALUES (?,?,?,?,?,?,?)";
            //Prepara o banco para execução
            $query = $banco->prepare($sql);
            //Executa o comando
            $query->execute([$obj->nome, $obj->peso, $obj->nascimento, $obj->cor, $obj->tipo, $obj->observacao, $obj->idCliente]);
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
            $sql = "SELECT * FROM animal ORDER BY nome";
            //Executar o comando e armazenar o resultado
            $resultado = $banco->query($sql);
            //Criando o array
            $lista = [];
            //percorrendo o resultado
            foreach($resultado as $linha){
                $lista[] = new Animal($linha["idAnimal"], $linha["nome"], $linha["peso"], $linha["nascimento"], $linha["cor"], $linha["tipo"], $linha["observacao"], $linha["idCliente"]);
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
            $sql = "SELECT idAnimal, nome FROM animal WHERE nome LIKE ? ORDER BY nome";
            // Preparar o comando
            $query = $banco->prepare($sql);
            $query->execute(["%$nome%"]);
            // Criando o array
            $lista = [];
            // Percorrendo o resultado
            while ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = new Animal($linha["idAnimal"], $linha["nome"], null, null, null, null, null, null);
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
            $sql = "DELETE FROM animal WHERE idAnimal = ?";
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
            $sql = "SELECT * FROM animal WHERE idAnimal = ? ORDER BY nome";
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

    public function update(Animal $obj){
        try{
            $banco = Conexao::conectar();
            $sql = "UPDATE animal SET nome=?, peso=?, nascimento=?, cor=?, tipo=?, observacao=?, idCliente=?
            WHERE idAnimal=?";
            $query = $banco->prepare($sql);
            $query->execute([$obj->nome, $obj->peso, $obj->nascimento, $obj->cor, $obj->tipo, $obj->observacao, $obj->idCliente, $obj->idAnimal]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

