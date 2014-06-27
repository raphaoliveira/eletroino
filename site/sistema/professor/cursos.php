<?php include 'header-professor.php'; ?>  

<?php

include('../conexao.php');

try {
    $sql = "SELECT * FROM cursos WHERE 
    		id_professor = (SELECT id_professor FROM professores WHERE login = '".$_SESSION['login']."')
       		ORDER BY curso ASC";

        $instrucao2 = $conexao->prepare($sql);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Cursos</h4></th>';
        echo ' <th><h4>Duração</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas2 as $linha2) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha2['curso'] . '</td>';
            echo '  <td>' . $linha2['duracao'] .  '</td>';

            ?>
            <td> <button type="button" class="btn" onclick="window.location.href='boletim.php?id=<?php echo $linha2['id_curso'] ?>'">  Visualizar</button> </td>

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
<?php include 'footer-professor.php'; ?>  