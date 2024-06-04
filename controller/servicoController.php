<?php
    session_start();
    include_once "../config/conexao.php";
    include_once "../dao/servicoDao.php";
    include_once "../model/servico.php";

    if((isset($_POST["btSalvar"]))||(isset($_GET["id"]))){
        //objeto do tipo servico
        $obj = new Servico($_POST["idServico"], $_POST["nome"], $_POST["descricao"], $_POST["preco"]);
        //objeto servicoDao
        $objDao = new ServicoDao();

        //verificando a operação que o usuário escolheu
        if(isset($_GET["id"])){
            //excluir
            $resultado = $objDao->delete($_GET["id"]);
            if($resultado)
                $_SESSION["mensagem"] = "Excluído com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao excluir";
        }elseif($_POST["idServico"]==""){
            //inserir
            $resultado = $objDao->create($obj);
            if($resultado)
                $_SESSION["mensagem"] = "Adicionado com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao cadastrar";
        }else{
            //alterar
            $resultado = $objDao->update($obj);
            if($resultado)
                $_SESSION["mensagem"] = "Alterado com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao alterar";
        }
        $_SESSION["resultado"] = $resultado;
    }
    header("location:../Crud_Servicos.php");
?>