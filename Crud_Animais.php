<?php
    //Importando os arquivos de manipulação dos dados
    include_once "topo.html";
    include_once "config/conexao.php";
    include_once "model/animal.php";
    include_once "dao/animalDao.php";
    include_once "css/stylecrud.css";
    include_once "dao/clienteDao.php";

    //Criando o objeto Dao
    $objDao = new AnimalDao();
    $objNome_Cliente = new ClienteDao();

?>
<!-- formulário de cadastro/alterar -->
<form id="cadastro" action="controller/animalController.php" method="post">
    <div class="interno">
        <div class="barra_superior">
            <h4>Animal</h4>
            <button id="fechar"><i class="fa-solid fa-circle-xmark"></i></button>
        </div>
        <input type="hidden" name="idAnimal">
        <!-- Nome -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="nome" class="form-control" placeholder="Nome do animal"></div>
        <!-- Tipo/Classificação -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="tipo" class="form-control" placeholder="Tipo do animal"></div>
        <!-- <select name="tipo" id="tipo">Tipo Animal</select> -->
        <!-- Peso -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="peso" class="form-control" placeholder="Peso animal"></div>
        <!-- Nascimento -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"> <input type="date" name="data" class="form-control" placeholder="Nascimento animal"></div>
        <!-- Cor -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="cor" class="form-control" placeholder="Cor do animal"></div>
        <!-- Observação -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="observacoes" class="form-control" placeholder="Dados relevantes"></div>
        <!-- Cliente -->
        <label for="cliente" class="form-label">Cliente</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="text" name="cliente" id="inputCliente" class="form-control" placeholder="Busque pelo cliente">
        </div>
        <div id="autocompleteCliente" class="autocomplete"></div>
        <!-- <select name="cliente" id="tipo">Cliente</select> -->
        <!-- Botão de Salvar/Cancelar -->
        <div id="botoes" class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="submit" name="btSalvar" class="btn btn-success" value="Salvar">
            <input type="reset" id="botao_cancelar" name="btCancelar" class="btn btn-danger" value="Cancelar">
        </div>
    </div>
</form>

<table class="table table-hover">
<div class="inicio">
        <h3 class="titulo">Animal</h3>
        <button class="adicionar">Adicionar</button>

    </div>
    <tr> <th>Nome</th> <th>Classificação</th> <th>Cliente</th> <th>Peso</th> <th>Nascimento</th> <th>Cor</th> <th>Observações</th> <th></th> </tr>
    <?php
        $resultado = $objDao->readAll();
        //validando o retorno
        if(is_null($resultado)){
            echo "<tr><td colspan='3'>Erro ao buscar os dados no banco</td></tr>";
        }else{
            foreach($resultado as $linha){
                echo "<tr>";
                echo "<td>{$linha->nome}</td>";
                echo "<td>{$linha->tipo}</td>";
                echo "<td>{$linha->idCliente}</td>";
                echo "<td>{$linha->peso}</td>";
                echo "<td>{$linha->nascimento}</td>";
                echo "<td>{$linha->cor}</td>";
                echo "<td>{$linha->observacao}</td>";
                echo "<td><a href='controller/animalController.php?id={$linha->idAnimal}'>
Excluir</a></td>";
                echo "</tr>";
            }
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.6/underscore-umd-min.js"></script>
    <script src="script3.js"></script>
    <script src="script.js"></script>
</table>
<?php
    include_once "rodape.html";
?>
