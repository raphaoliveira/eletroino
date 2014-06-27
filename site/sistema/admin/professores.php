<?php include 'header-admin.php'; ?> 

    <div style="float:left;">
    <form method="post" action="buscar-professor.php">
        <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome, Login ou Email">
        <input type="submit" class ="btn" value="Buscar">
    </form> 
    </div>
    <div style="float:right;">
    <form action="cadastrar-professor.php">
        <input type="submit" class ="btn" value="Adicionar Professor">
    </form> 
    </div>


<?php

include('../conexao.php');

try {
    $sql = "SELECT * FROM professores 
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
        echo ' <th style="float: right;"><h4>Ações</h4></th>';
        
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
            <td> <button type="button" class="btn" onclick="window.location.href='alterar-professor.php?id=<?php echo $linha2['id_professor'] ?>'">  Detalhar</button> </td>
            
            <td> <button type="button" class="btn" onclick="window.location.href='excluir-professor.php?id=<?php echo $linha2['id_professor'] ?>'">  Excluir</button> </td>
            
            
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