<?php include 'header-aluno.php'; ?>  

<?php include('../conexao.php');

try {

    $sql = "SELECT * FROM alunos WHERE id_aluno LIKE :id";

    $instrucao = $conexao->prepare($sql);
    $dados = array('id' => $_GET['id']);
    $instrucao->execute($dados);
    $linhas = $instrucao->fetchAll();

    foreach($linhas as $linha) {

?>

    <div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alteração de Cadastro do Aluno</h3>
            <form align="left" class="form-horizontal" method="post" action="tratar-alterar-aluno.php?id=<?php echo $_GET['id'] ?>">
                <div class="control-group">
                    <label class="control-label" for="Nome">Nome</label>
                    <div class="controls">
                        <input class="span8" type="text" required name="nome" id="nome" placeholder="Nome" value="<?php echo $linha['nome'] ?>">
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="rg">RG</label>
                    <div class="controls">
                        <input class="span8" type="text" required name="rg" id="rg" placeholder="RG" value="<?php echo $linha['rg'] ?>">
                    </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="cpf">CPF</label>
                    <div class="controls">
                        <input class="span8" type="text" required name="cpf" id="cpf" placeholder="CPF" value="<?php echo $linha['cpf'] ?>">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="Email">E-Mail</label>
                    <div class="controls">
                       <input class="span8" type="text" required name="email" id="email" placeholder="Email" value="<?php echo $linha['email'] ?>" oninput="validacaoEmail(this)">
                       <img id="imgemail" src="" style="display: inline;">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="Endereco">Endereço</label>
                    <div class="controls">
                        <input class="span8" type="text" required name="endereco" id="endereco" placeholder="Endereço" value="<?php echo $linha['endereco'] ?>">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="Tel">Telefone</label>
                    <div class="controls">
                        <input class="span8" type="text" required name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $linha['telefone'] ?>">
                    </div>
                </div>
                
                 <div class="control-group">
                    <label class="control-label" for="Senha"> Nova Senha</label>
                    <div class="controls">
                        <input class="span8" type="password" name="senha" id="senha" placeholder="Senha">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="confsenha"> Confirmar Nova Senha</label>
                    <div class="controls">
                        <input class="span8" type="password" id="confsenha" oninput="validaSenha(this)" name="confsenha" placeholder="Confirmar Senha">
                        <img id="imgconfsenha" src="" style="display: inline;">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Salvar</button>
                        <button style="margin-left:30px;" class="btn" id="cancelarcadastro" onClick="cancelar();">  Cancelar</button>
                    </div>
                    <div class="controls">
                </div>
                </div>
         

    <?php 

        }

    }
    catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    $conexao = null;
    ?>

   </form>
            
</div>
</div>

<?php include 'footer-aluno.php'; ?>  