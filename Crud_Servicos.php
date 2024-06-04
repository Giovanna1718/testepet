<?php
    //Importando os arquivos de manipulação dos dados
    include_once "topo.html";
    include_once "config/conexao.php";
    include_once "model/servico.php";
    include_once "dao/servicoDao.php";
    include_once "css/stylecrud.css";


    //Criando o objeto Dao
    $objDao = new ServicoDao();

?>
<!-- formulário de cadastro/alterar -->
<form id="cadastro" action="controller/servicoController.php" method="post">
    <div class="interno">
        <div class="barra_superior">
            <h4>Serviço</h4>
            <button id="fechar"><i class="fa-solid fa-circle-xmark"></i></button>
            
        </div>
        <input type="hidden" name="idServico">
        <!-- Nome -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="nome" class="form-control" placeholder="Nome do Serviço"></div>
        <!-- Descrição -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="descricao" class="form-control" placeholder="Descrição do Serviço"></div>
        <!-- Preço -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="preco" class="form-control" placeholder="Preço do servico"></div>

        <!-- Botão de Salvar/Cancelar -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="submit" name="btSalvar" class="btn btn-success" value="Salvar">
            <input type="reset" id="botao_cancelar" name="btCancelar" class="btn btn-danger" value="Cancelar">
        </div>
    </div>
</form>

<table class="table table-hover">
<div class="inicio">
        <h3 class="titulo">Tipo de Serviço</h3>
        <button class="adicionar">Adicionar</button>

    </div>
    <tr> <th>Serviço</th> <th>Descrição</th> <th>Preço</th> <th></th> </tr>
    <?php
        $resultado = $objDao->readAll();
        //validando o retorno
        if(is_null($resultado)){
            echo "<tr><td colspan='3'>Erro ao buscar os dados no banco</td></tr>";
        }else{
            foreach($resultado as $linha){
                echo "<tr>";
                echo "<td>{$linha->nome}</td>";
                echo "<td>{$linha->descricao}</td>";
                echo "<td>{$linha->preco}</td>";
                echo "<td><a href='controller/servicoController.php?id={$linha->idServico}'>
Excluir</a></td>";
                echo "</tr>";
            }
        }
    ?>
    <script src="script.js"></script>
</table>
<?php
    
    include_once "rodape.html";
?>
