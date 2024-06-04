<?php
    //Importando os arquivos de manipulação dos dados
    include_once "topo.html";
    include_once "config/conexao.php";
    include_once "model/visita.php";
    include_once "dao/visitaDao.php";
    include_once "css/stylecrud.css";

    //Criando o objeto Dao
    $objDao = new VisitaDao();

?>
<!-- formulário de cadastro/alterar -->

<!-- <form id="cadastro" action="controller/visitaController.php" method="post">
    <div class="interno">
        <div class="barra_superior">
            <h4>Agendamento</h4>
            <button id="fechar"><i class="fa-solid fa-circle-xmark"></i></button>
            
        </div>
        <input type="hidden" name="idVisita">
        // Animal
        <label for="animal" class="form-label">Animal</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="animal" id="searchInput inputAnimal" class="form-control" placeholder="Busque pelo animal"></div>
        <div id="autocomplete #autocompleteAnimal"></div>
       
        // Data do Agendamento 
        <label for="data" class="form-label">Data do Agendamento</label>
        <div id="campo data" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="date" name="data_agendamento" class="form-control" placeholder="Adicione a Data"></div>
        // Cliente 
        <label for="cliente" class="form-label">Cliente</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="cliente" id="searchInput inputCliente" class="form-control" placeholder="Busque pelo cliente"></div>
        <label for="">Cliente</label>
        <div id="autocomplete #autocompleteCliente"></div>
        // Responsável da execução 
        <label for="animal" class="form-label">Responsável da execução</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="funcionario" id="searchInput inputFuncionario" class="form-control" placeholder="Busque pelo funcionario"></div>
        <div id="autocomplete #autocompleteFuncionario"></div>
        // Valor Total 
        <label for="total" class="form-label">Total</label>
        <div id="campo total" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="telefone" class="form-control" placeholder="Digite o valor total"></div>
        // (Concluído/Não concluído)
    
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="1" id="adm" name="adm">
                <label class="form-check-label" for="adm">Concluído</label>
            </div>
        </div>
        // Botão de Salvar/Cancelar 
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="submit" name="btSalvar" class="btn btn-success" value="Salvar">
            <input type="reset" name="btCancelar" class="btn btn-danger" value="Cancelar">
        </div>
    </div>
</form> -->

<form id="cadastro" action="controller/visitaController.php" method="post">
    <div class="interno">
        <div class="barra_superior">
            <h4>Agendamento</h4>
            <button id="fechar"><i class="fa-solid fa-circle-xmark"></i></button>
        </div>
        <input type="hidden" name="idVisita">
        <!-- Animal -->
        <label for="animal" class="form-label">Animal</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="text" name="animal" id="inputAnimal" class="form-control" placeholder="Busque pelo animal">
        </div>
        <div id="autocompleteAnimal" class="autocomplete"></div>
       
        <!-- Data do Agendamento -->
        <label for="data" class="form-label">Data do Agendamento</label>
        <div id="campoData" class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="date" name="data_agendamento" class="form-control" placeholder="Adicione a Data">
        </div>
        <!-- Cliente -->
        <label for="cliente" class="form-label">Cliente</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="text" name="cliente" id="inputCliente" class="form-control" placeholder="Busque pelo cliente">
        </div>
        <div id="autocompleteCliente" class="autocomplete"></div>
 
        <!-- Responsável da execução -->
        <label for="funcionario" class="form-label">Responsável da execução</label>
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="text" name="funcionario" id="inputFuncionario" class="form-control" placeholder="Busque pelo funcionario">
        </div>
        <div id="autocompleteFuncionario" class="autocomplete"></div>
        
        <!-- Valor Total -->
        <label for="total" class="form-label">Total</label>
        <div id="campoTotal" class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="number" name="telefone" class="form-control" placeholder="Digite o valor total">
        </div>
        <!-- (Concluído/Não concluído) -->
    
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="1" id="adm" name="adm">
                <label class="form-check-label" for="adm">Concluído</label>
            </div>
        </div>
        <!-- Botão de Salvar/Cancelar -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="submit" name="btSalvar" class="btn btn-success" value="Salvar">
            <input type="reset" id="botao_cancelar" name="btCancelar" class="btn btn-danger" value="Cancelar">
        </div>
    </div>
</form>


<table class="table table-hover">
<div class="inicio">
        <h3 class="titulo">Agendamentos</h3>
        <button class="adicionar">Adicionar</button>

    </div>
    <tr> <th>Status</th> <th>Data</th> <th>Animal</th> <th>Cliente</th> <th>Responsável</th> <th></th> </tr>
    <?php
        $resultado = $objDao->readAll();
        //validando o retorno
        if(is_null($resultado)){
            echo "<tr><td colspan='3'>Erro ao buscar os dados no banco</td></tr>";
        }else{
            foreach($resultado as $linha){
                echo "<tr>";
                echo "<td>{$linha->nome}</td>";
                echo "<td>{$linha->data}</td>";
                echo "<td>{$linha->idAnimal}</td>";
                echo "<td>{$linha->idCliente}</td>";
                echo "<td>{$linha->idFuncionario}</td>";
                echo "<td><a href='controller/visitaController.php?id={$linha->idVisita}'>
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
