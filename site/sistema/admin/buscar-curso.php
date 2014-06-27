<?php include 'header-admin.php'; ?> 


    <div style="float:left;">
            <form method="post" action="buscar-curso.php">
                <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome do Curso">
                <input type="submit" class ="btn" value="Buscar">
            </form> 
    </div>
 

<?php

include('../conexao.php');

try {
    $sql = "SELECT id_curso, curso, nome, duracao, valor 
            FROM cursos c 
            LEFT JOIN professores p 
            ON p.id_professor = c.id_professor 
            WHERE curso like :q";

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
        echo ' <th><h4>Curso</h4></th>';
        echo ' <th><h4>Professor</h4></th>';
        echo ' <th><h4>Duração</h4></th>';
        echo ' <th><h4>Valor</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach($linhas as $linha) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha['curso'] . '</td>';
            echo '  <td>' . $linha['nome'] .  '</td>';
            echo '  <td>' . $linha['duracao'] . '</td>';
            echo '  <td>' . $linha['valor'] .  '</td>';

            ?>
            <td> <button type="button" onclick="window.location.href='alterar-curso.php?id=<?php echo $linha['id_curso'] ?>'">  Alterar</button> </td>
            <?php
            ?>
            <td> <button type="button" onclick="window.location.href='excluir-curso.php?id=<?php echo $linha['id_curso'] ?>'">  Excluir</button> </td>
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
    <form action="cursos.php">
    <br><br>
        <input type="submit" class ="btn" value="Voltar">
    </form> 
    </div>
    <br><br><br><br>
    
<?php include 'footer-admin.php'; ?>  