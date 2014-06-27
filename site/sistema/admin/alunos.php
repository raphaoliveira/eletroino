<?php include 'header-admin.php'; ?> 

    <div style="float:left;">
    <form method="post" action="buscar-aluno.php">
        <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome, Login ou Email">
        <input type="submit" class ="btn" value="Buscar">
    </form> 
    </div>
    <div style="float:right;">
    <form action="cadastrar-aluno.php">
        <input type="submit" class ="btn" value="Adicionar Aluno">
    </form> 
    </div>

<?php

include('../conexao.php');

try {
    $sql = "SELECT * FROM alunos
            ORDER BY nome ASC";

        $instrucao2 = $conexao->prepare($sql);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Nome</h4></th>';
        echo ' <th><h4>Email</h4></th>';
        echo ' <th><h4>Telefone</h4></th>';
        echo ' <th><h4>Login</h4></th>';
        echo ' <th> </th>';
        echo ' <th><h4>Ações</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas2 as $linha2) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha2['nome'] . '</td>';
            echo '  <td>' . $linha2['email'] .  '</td>';
            echo '  <td>' . $linha2['telefone'] . '</td>';
            echo '  <td>' . $linha2['login'] .  '</td>';

            ?>
            <td> 
                <button type="button" class="btn" onclick="window.location.href='matricular-aluno.php?id=<?php echo $linha2['id_aluno'] ?>'">  Matricular</button>
            </td>
            <td> 
                <button type="button" class="btn" onclick="window.location.href='alterar-aluno.php?id=<?php echo $linha2['id_aluno'] ?>'">  Detalhar</button>
            </td>
            <td> 
                 <button type="button" class="btn" onclick="window.location.href='excluir-aluno.php?id=<?php echo $linha2['id_aluno'] ?>'">  Excluir</button>
            </td>
            <?php
            echo '</tr>';

        
         }
         echo '</tbody>';
         echo '</table>';
    
}
catch (PDOException $ex) {
    echo $ex->getMessage();
}

$conexao = null;

?>

<?php include 'footer-admin.php'; ?>  