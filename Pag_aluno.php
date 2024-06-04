<?php
    //Importando os arquivos de manipulação dos dados
    include_once "topo.html";
    include_once "config/conexao.php";
    include_once "model/aluno.php";
    include_once "dao/alunoDao.php";

    //Criando o objeto Dao
    $objDao = new AlunoDao();

?>
<!-- formulário de cadastro/alterar -->
<form action="controller/alunoController.php" method="post">
    <input type="hidden" name="idAluno">
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="text" name="nome" class="form-control" placeholder="Digite o nome">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="text" name="apelido" class="form-control" 
        placeholder="Digite um apelido">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="email" name="email" class="form-control" 
            placeholder="Digite o e-mail">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="password" name="senha" class="form-control" 
            placeholder="Digite a senha">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="password" name="senha" class="form-control" 
            placeholder="Confirma a senha">
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" value="1" 
            id="adm" name="adm">
            <label class="form-check-label" for="adm">Administrador</label>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 offset-md-4 p-1">
        <input type="submit" name="btSalvar" class="btn btn-success" 
            value="Salvar">
        <input type="reset" name="btCancelar" class="btn btn-danger" 
            value="Cancelar">
    </div>
</form>

<table class="table table-hover">
    <tr> <th>Nome</th> <th>Email</th> <th></th> </tr>
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
                echo "<td><a href='controller/alunoController.php?id={$linha->idaluno}'>
Excluir</a></td>";
                echo "</tr>";
            }
        }
    ?>
</table>
<?php
    include_once "rodape.html";
?>
