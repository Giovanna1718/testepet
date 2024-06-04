<?php
    session_start();
    include_once "../config/conexao.php";
    include_once "../dao/animalDao.php";
    include_once "../model/animal.php";

    if((isset($_POST["btSalvar"]))||(isset($_GET["id"]))){
        //objeto do tipo animal
        $obj = new Animal($_POST["idAnimal"], $_POST["nome"], $_POST["peso"], $_POST["nascimento"], $_POST["cor"], $_POST["tipo"], $_POST["observacao"], $_POST["idCliente"]);
        //objeto animalDao
        $objDao = new AnimalDao();

        //verificando a operação que o usuário escolheu
        if(isset($_GET["id"])){
            //excluir
            $resultado = $objDao->delete($_GET["id"]);
            if($resultado)
                $_SESSION["mensagem"] = "Excluído com sucesso!";
            else
                $_SESSION["mensagem"] = "Erro ao excluir";
        }elseif($_POST["idAnimal"]==""){
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
    header("location:../Crud_Animais.php");
?>