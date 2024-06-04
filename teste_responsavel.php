<?php
include_once "config/conexao.php";
include_once "dao/funcionarioDao.php";

header('Content-Type: application/json');

if (isset($_GET['funcionario'])) {
    $nome = $_GET['funcionario'];
    $funcionarioDao = new FuncionarioDao();
    $funcionarios = $funcionarioDao->readNome($nome);

    $result = [];
    foreach ($funcionarios as $funcionario) {
        $result[] = [
            "idFuncionario" => $funcionario->getIdFuncionario(),
            "nome" => $funcionario->getNome(),
        ];
    }
    
    echo json_encode($result);
} else {
    echo json_encode([]);
}
?>
