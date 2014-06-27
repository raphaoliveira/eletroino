<?php include 'header-admin.php'; ?> 


    <div style="float:left;">
            <form method="post" action="buscar-administradores.php">
                <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome, Login ou Email">
                <input type="submit" class ="btn" value="Buscar">
            </form> 
    </div>
 

<?php

include('../conexao.php');

try {
    $sql = "SELECT * FROM administradores WHERE
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
            <td> <button type="button" onclick="window.location.href='alterar-admin.php?id=<?php echo $linha['id_administrador'] ?>'">  Alterar</button> </td>
            <?php
            ?>
            <td> <button type="button" onclick="window.location.href='excluir-admin.php?id=<?php echo $linha['id_administrador'] ?>'">  Excluir</button> </td>
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
    <form action="administradores.php">
    <br><br>
        <input type="submit" class ="btn" value="Voltar">
    </form> 
    </div>
    <br><br><br><br>
    
<?php include 'footer-admin.php'; ?>  