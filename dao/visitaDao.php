<?php
//VisitaDao.php
include_once "config/conexao.php";
// Inclua o arquivo da classe Cliente
include_once "model/visita.php";
class VisitaDao{
    public function create(Visita $obj){
        try{
            //criando a conexao com o banco
            $banco = Conexao::conectar();
            //criando o comando SQL
            $sql = "INSERT INTO visita (data, concluido, total, idAnimal, idCliente, idFuncionario) 
                VALUES (?,?,?,?,?,?)";
            //Prepara o banco para execução
            $query = $banco->prepare($sql);
            //Executa o comando
            $query->execute([$obj->data, $obj->concluido, $obj->total, $obj->idAnimal, $obj->idCliente, $obj->idFuncionario]);
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
            $sql = "SELECT * FROM visita ORDER BY data desc";
            //Executar o comando e armazenar o resultado
            $resultado = $banco->query($sql);
            //Criando o array
            $lista = [];
            //percorrendo o resultado
            foreach($resultado as $linha){
                $lista[] = new Visita($linha["idVisita"], $linha["data"], $linha["concluido"], $linha["total"], $linha["idAnimal"], $linha["idCliente"], $linha["idFuncionario"]);
            } //fim foreach

            Conexao::desconectar();
            return $lista;
        }catch(PDOException $e){
            return null;
        }
    }

    public function delete($id){
        try{
            $banco = Conexao::conectar();
            $sql = "DELETE FROM visita WHERE idVisita = ?";
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
            $sql = "SELECT * FROM visita WHERE idVisita = ? ORDER BY data desc";
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

    public function update(Visita $obj){
        try{
            $banco = Conexao::conectar();
            $sql = "UPDATE visita SET data=?, concluido=?, total=?, idAnimal=?, idCliente=?, idFuncionario=?
            WHERE idVisita=?";
            $query = $banco->prepare($sql);
            $query->execute([$obj->data, $obj->concluido, $obj->total, $obj->idAnimal, $obj->idCliente, $obj->idFuncionario, $obj->idVisita]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
