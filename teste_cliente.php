<?php
include_once "config/conexao.php";
include_once "dao/clienteDao.php";

header('Content-Type: application/json');

if (isset($_GET['cliente'])) {
    $nome = $_GET['cliente'];
    $clienteDao = new ClienteDao();
    $clientes = $clienteDao->readNome($nome);

    $result = [];
    foreach ($clientes as $cliente) {
        $result[] = [
            "idCliente" => $cliente->getIdCliente(),
            "nome" => $cliente->getNome(),
        ];
    }
    
    echo json_encode($result);
} else {
    echo json_encode([]);
}
?>
