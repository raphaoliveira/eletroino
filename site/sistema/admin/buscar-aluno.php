<?php include 'header-admin.php'; ?> 


    <div style="float:left;">
            <form method="post" action="buscar-aluno.php">
                <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome, Login ou Email">
                <input type="submit" class ="btn" value="Buscar">
            </form> 
    </div>
 

<?php

include('../conexao.php');

try {
    $sql = "SELECT * FROM alunos WHERE
            nome like :q OR
            login like :q OR
            email like :q";

    $q = isset($_POST['q']) ? $_POST['q'] : '';

    if($q != '')
    {
        $instrucao = $conexao->prepare($sql);
        $dados = array('q' => $q.'%');
        $instrucao->execute($dados);
        $linhas = $instrucao->fetchAll();

       echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Nome</h4></th>';
        echo ' <th><h4>Email</h4></th>';
        echo ' <th><h4>Telefone</h4></th>';
        echo ' <th><h4>Login</h4></th>';
        echo ' <th><h4>Ações</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach($linhas as $linha) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha['nome'] . '</td>';
            echo '  <td>' . $linha['email'] .  '</td>';
            echo '  <td>' . $linha['telefone'] . '</td>';
            echo '  <td>' . $linha['login'] .  '</td>';

            ?>
            <td> 
                <button type="button" class="btn" onclick="window.location.href='matricular-aluno.php?id=<?php echo $linha['id_aluno'] ?>'">  Matricular</button>
            </td>
            <td> 
                <button type="button" class="btn" onclick="window.location.href='alterar-aluno.php?id=<?php echo $linha['id_aluno'] ?>'">  Detalhar</button>
            </td>
            <td> 
                 <button type="button" class="btn" onclick="window.location.href='excluir-aluno.php?id=<?php echo $linha['id_aluno'] ?>'">  Excluir</button>
            </td>
            <?php
            echo '<br>';
            echo '</tr>';

        
         }
         echo '</tbody>';
         echo '</table>';
    }
    
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>
    <div class="span1" style="float:right;">
    <form action="alunos.php">
    <br><br>
        <input type="submit" class ="btn" value="Voltar">
    </form> 
    </div>
    <br><br><br><br>
    
<?php include 'footer-admin.php'; ?>  