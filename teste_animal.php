<?php
include_once "config/conexao.php";
include_once "dao/animalDao.php";

header('Content-Type: application/json');

if (isset($_GET['animal'])) {
    $nome = $_GET['animal'];
    $animalDao = new AnimalDao();
    $animais = $animalDao->readNome($nome);

    $result = [];
    foreach ($animais as $animal) {
        $result[] = [
            "idFuncionario" => $animal->getIdAnimal(),
            "nome" => $animal->getNome(),
        ];
    }
    
    echo json_encode($result);
} else {
    echo json_encode([]);
}
?>
