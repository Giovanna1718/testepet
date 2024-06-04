<?php
    session_start();
    include_once "../config/conexao.php";
    include_once "../dao/funcionarioDao.php";
    include_once "../model/funcionario.php";

    if((isset($_POST["btSalvar"]))||(isset($_GET["id"]))){
        //objeto do tipo funcionario
        $obj = new Funcionario($_POST["idFuncionario"], isset($_POST["admin"]) ? 1 : 0, $_POST["nome"], $_POST["telefone1"], $_POST["telefone2"], $_POST["email"], $_POST["senha"], $_POST["logradouro"], $_POST["cep"], $_POST["numero"], $_POST["cidade"], $_POST["estado"], $_POST["cpf"]);
        //objeto funcionarioDao
        $objDao = new FuncionarioDao();

        //verificando a operação que o usuário escolheu
        if(isset($_GET["id"])){
            //excluir
            $resultado = $objDao->delete($_GET["id"]);
            if($resultado)
                $_SESSION["mensagem"] = "Excluído com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao excluir";
        }elseif($_POST["idFuncionario"]==""){
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
    header("location:../Crud_Funcionario.php");
?>

