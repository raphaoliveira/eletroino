<?php include 'header-admin.php'; 

include('../conexao.php');

$sql = "SELECT login FROM alunos";
$instrucao2 = $conexao->prepare($sql);
$instrucao2->execute();
$linhas2 = $instrucao2->fetchAll();

$key = 0;

foreach ($linhas2 as $linhas2) {
    $linhas3[$key] = $linhas2['login'];
    $key++;
}

$linhas4 = implode(" ", $linhas3);

?>

<div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cadastro de Aluno</h3>
            <form name="registroadmin" align="left" class="form-horizontal" method="post" action="tratar-cadastro-aluno.php" id="registroadmin">
                <div class="control-group">
                    <label class="control-label status" for="nome">Nome</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="nome" name="nome" placeholder="Nome">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="rg">RG</label>
                    <div class="controls">
                        <input class="span8" type="text" name="rg" id="rg" placeholder="RG" >
                    </div>
                </div>
                  <div class="control-group">
                    <label class="control-label" for="cpf">CPF</label>
                    <div class="controls">
                        <input class="span8" type="text" name="cpf" id="cpf" placeholder="CPF" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label status" for="email">E-Mail</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="email" name="email" placeholder="Ex: email@email.com" oninput="validacaoEmail(this)">
                        <img id="imgemail"  style="display: inline;">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="Endereco">Endereço</label>
                    <div class="controls">
                        <input class="span8" type="text" name="endereco" id="endereco" placeholder="Endereço" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="telefone">Telefone</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="telefone" name="telefone" placeholder="Telefone" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="login">Login</label>
                    <div class="controls">
                        <input type="hidden" id="logins" value="<?php echo $linhas4 ?>" >
                        <input class="span8" type="text" required id="login" name="login" placeholder="Login" oninput="validaLogin(this);" >
                        <img id="imglogin"  style="display: inline;">
                    </div>
                </div>
                
                 <div class="control-group">
                    <label class="control-label" for="senha">Senha</label>
                    <div class="controls">
                        <input class="span8" type="password" required id="senha" name="senha" placeholder="Senha">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="confsenha"> Confirmar Senha</label>
                    <div class="controls">
                        <input class="span8" type="password" required id="confsenha" oninput="validaSenha(this);" name="confsenha" placeholder="Confirmar Senha">
                        <img id="imgconfsenha"  style="display: inline;">
                    </div>
                </div>
               
                  
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Salvar</button>
                        <button style="margin-left:30px;" id="cancelaraluno" class="btn" onClick="cancelar();">  Cancelar</button>
                        
                    </div>                   
                </div>
            </form>

        </div>
      </div>


<?php include 'footer-admin.php'; ?>  