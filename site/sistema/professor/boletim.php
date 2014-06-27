<?php include 'header-professor.php'; ?>  

    <div style="float:left;">
    <form method="post" action="buscar-aluno.php?id=<?php echo $_GET['id'] ?>">
        <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome">
        <input type="submit" class="btn" value="Buscar">
    </form> 
    </div>
    
    <div class="span1" style="float:right;">
    <form action="cursos.php">
    <br><br>
        <input type="submit" class="btn" value="Voltar">
    </form> 
    </div>


<?php

include('../conexao.php');

try {
    $sql = 'SELECT id_boletim,
                   nota,
                   falta,
                   nome
            FROM boletins b
            INNER JOIN alunos a ON a.id_aluno = b.id_aluno
            WHERE id_curso = '.$_GET['id'].' ;';

        $instrucao2 = $conexao->prepare($sql);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();

        $sql2 = 'SELECT curso
            FROM cursos
            WHERE id_curso = '.$_GET['id'].' ;';

        $instrucao3 = $conexao->prepare($sql2);
        $instrucao3->execute();
        $linhas4 = $instrucao3->fetchAll();
        $linhas5 = $linhas4[0];

        
        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr> <th><h1><center> Curso de '.$linhas5['curso'].'</center></h1></th> </tr>';
        echo '<br><br>';
        echo '<tr>';
        echo ' <th><h4>Aluno</h4></th>';
        echo ' <th><h4>Nota</h4></th>';
        echo ' <th><h4>Falta</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas2 as $linha2) {
            echo ' <form action="tratar-boletim.php" method="post">';
            echo '<tr class="warning">';
            
            echo '  <td style="width: 800px;">' . $linha2['nome'] . '</td>';
            echo '  <td> <input style="width: 40px;" type="text" name="nota" id="nota" placeholder="Nota" value="'.$linha2['nota'].'"> </td>';
            echo '  <td> <input style="width: 40px;" type="text" name="falta" id="falta" placeholder="Falta" value="'.$linha2['falta'].'"> </td>';

            ?>
            <input type="hidden" id="id_boletim" name="id_boletim" value="<?php echo $linha2['id_boletim'] ?>" >
            <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $_GET['id'] ?>" >
            <td> <input type="submit" class="btn" value="Salvar"></td>
            
            <?php
            echo '</tr>';
            echo '</form>';
            
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