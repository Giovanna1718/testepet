<?php
    session_start();
    include_once "../config/conexao.php";
    include_once "../dao/visitaDao.php";
    include_once "../model/visita.php";

    if((isset($_POST["btSalvar"]))||(isset($_GET["id"]))){
        //objeto do tipo visita
        $obj = new Visita($_POST["idVisita"], $_POST["data"], $_POST["concluido"], $_POST["total"], $_POST["idAnimal"], $_POST["idCliente"], $_POST["idFuncionario"]);
        //objeto visitaDao
        $objDao = new VisitaDao();

        //verificando a operação que o usuário escolheu
        if(isset($_GET["id"])){
            //excluir
            $resultado = $objDao->delete($_GET["id"]);
            if($resultado)
                $_SESSION["mensagem"] = "Excluído com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao excluir";
        }elseif($_POST["idVisita"]==""){
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
    header("location:../Crud_Visitas.php");
?>