<?php
//sevicoDao.php
class ServicoDao{
    public function create(Servico $obj){
        try{
            //criando a conexao com o banco
            $banco = Conexao::conectar();
            //criando o comando SQL
            $sql = "INSERT INTO servico (nome, descricao, preco) 
                VALUES (?,?,?)";
            //Prepara o banco para execução
            $query = $banco->prepare($sql);
            //Executa o comando
            $query->execute([$obj->nome, $obj->descricao, $obj->preco]);
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
            $sql = "SELECT * FROM servico ORDER BY nome";
            //Executar o comando e armazenar o resultado
            $resultado = $banco->query($sql);
            //Criando o array
            $lista = [];
            //percorrendo o resultado
            foreach($resultado as $linha){
                $lista[] = new Servico($linha["idServico"], $linha["nome"], $linha["descricao"], $linha["preco"]);
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
            $sql = "DELETE FROM servico WHERE idServico= ?";
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
            $sql = "SELECT * FROM servico WHERE idServico = ? ORDER BY nome";
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

    public function update(Servico $obj){
        try{
            $banco = Conexao::conectar();
            $sql = "UPDATE servico SET nome=?, descricao=?, preco=?
            WHERE idServico=?";
            $query = $banco->prepare($sql);
            $query->execute([$obj->nome, $obj->descricao, $obj->preco, $obj->idServico]);
            Conexao::desconectar();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
