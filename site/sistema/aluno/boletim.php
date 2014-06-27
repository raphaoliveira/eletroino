<?php include 'header-aluno.php'; ?>  

<?php

include('../conexao.php');

try {
    $sql = "SELECT nome, curso, nota, falta 
    		FROM boletins b
    		INNER JOIN alunos a
			ON a.id_aluno = b.id_aluno
			INNER JOIN cursos c
			ON c.id_curso = b.id_curso
    		WHERE a.id_aluno = ".$linhas6['id_aluno']." ;";

        $instrucao = $conexao->prepare($sql);
        $instrucao->execute();
        $linhas = $instrucao->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Nome</h4></th>';
        echo ' <th><h4>Curso</h4></th>';
        echo ' <th><h4>Nota</h4></th>';
        echo ' <th><h4>Falta</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas as $linha2) {
            echo '<tr class="warning">';
            echo '  <td style="width: 400px;">' . $linha2['nome'] . '</td>';
            echo '  <td style="width: 400px;">' . $linha2['curso'] .  '</td>';
            echo '  <td style="width: 50px;">' . $linha2['nota'] . '</td>';
            echo '  <td style="width: 50px;">' . $linha2['falta'] .  '</td>';

            ?>
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

<?php include 'footer-aluno.php'; ?>  