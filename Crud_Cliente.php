<?php
    //Importando os arquivos de manipulação dos dados
    include_once "topo.html";
    include_once "config/conexao.php";
    include_once "model/cliente.php";
    include_once "dao/ClienteDao.php";
    include_once "css/stylecrud.css";

    //Criando o objeto Dao
    $objDao = new ClienteDao();

?>
<!-- formulário de cadastro/alterar -->
<form id="cadastro" action="controller/clienteController.php" method="post">
    <div class="interno">
        <div class="barra_superior">
            <h4>Cliente</h4>
            <button id="fechar"><i class="fa-solid fa-circle-xmark"></i></button>
            
        </div>
        <input type="hidden" name="idCliente">
        <!-- Nome -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="nome" class="form-control" placeholder="Digite o nome"></div>
        <!-- Telefone 1 -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="telefone" class="form-control" placeholder="Digite o telefone"></div>
        <!-- Telefone 2 -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="telefone" class="form-control" placeholder="Digite o telefone 2"></div>
        <!-- E-mail -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"> <input type="email" name="email" class="form-control" placeholder="Digite o e-mail"></div>
        <!-- Senha -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="password" name="senha" class="form-control" placeholder="Digite a senha temporária"></div>
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="password" name="senha2" class="form-control" placeholder="Corfirme a senha temporária"></div>
        <!-- Logradouro -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="logradouro" class="form-control" placeholder="Digite o Logradouro"></div>
        <!-- CEP -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="cep" class="form-control" placeholder="Digite o CEP"></div>
        <!-- Número casa -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="num_casa" class="form-control" placeholder="Digite o número da casa"></div>
        <!-- Cidade -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="cidade" class="form-control" placeholder="Digite a cidade"></div>
        <!-- Estado -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="text" name="estado" class="form-control" placeholder="Digite o estado"></div>
        <!-- CPF -->
        <div id="campo" class="col-sm-12 col-md-4 offset-md-4 p-1"><input type="number" name="num_casa" class="form-control" placeholder="Digite o CPF"></div>
        <!-- Botão de Salvar/Cancelar -->
        <div class="col-sm-12 col-md-4 offset-md-4 p-1">
            <input type="submit" name="btSalvar" class="btn btn-success" value="Salvar">
            <input type="reset" id="botao_cancelar" name="btCancelar" class="btn btn-danger" value="Cancelar">
        </div>
    </div>
</form>

<table class="table table-hover">
<div class="inicio">
        <h3 class="titulo">Cliente</h3>
        <button class="adicionar">Adicionar</button>

    </div>
    <tr> <th>Nome</th> <th>E-mail</th> <th>Telefone</th> <th>Número de animais</th> <th>Número de agendamentos</th> <th></th> </tr>
    <?php
        $resultado = $objDao->readAll();
        //validando o retorno
        if(is_null($resultado)){
            echo "<tr><td colspan='3'>Erro ao buscar os dados no banco</td></tr>";
        }else{
            foreach($resultado as $linha){
                echo "<tr>";
                echo "<td>{$linha->nome}</td>";
                echo "<td>{$linha->email}</td>";
                echo "<td>{$linha->telefone1}</td>";
                echo "<td>{$linha->email}</td>"; // Quantas relações terá com a tabela de animal (select count(*) from animal where idCliente = $resultado;)??
                echo "<td>{$linha->email}</td>"; // Quantas relações terá com a tabela de visita (select count(*) from visita where idCliente = $resultado and concluido = 0;)??
                echo "<td><a href='clienteController.php?id={$linha->idCliente}'>
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
