<?php include 'header-admin.php'; ?>

<?php 
try{

$sql = "SELECT nome FROM alunos WHERE id_aluno = ".$_GET['id']." ;";

        $instrucao2 = $conexao->prepare($sql);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();
        $linhas3 = $linhas2[0];
}

catch (PDOException $ex) {
    echo $ex->getMessage();
}

try
{

$sql2 = "SELECT curso FROM cursos ORDER BY curso ;";

        $instrucao3 = $conexao->prepare($sql2);
        $instrucao3->execute();
        $linhas4 = $instrucao3->fetchAll();
    }

    catch (PDOException $ex) {
    echo $ex->getMessage();
}

?>

<div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Escolha o Curso</h3>
            <form name="registroadmin" align="left" class="form-horizontal" method="post" action="tratar-cadastro-matricula.php?id=<?php echo $_GET['id'] ?>" id="registroadmin">
                <div class="control-group">
                    <label class="control-label status" for="nome" > Aluno</label>
                    <div class="controls">
                        <input class="span8" type="text" value="<?php echo $linhas3['nome'] ?>" disabled id="nome" name="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label status" for="curso" > Curso</label>
                    <div class="controls">
                        <?php 
                        echo '<select required style="width: 315px;" name="curso"> ';
                        echo '<option value=""> ----- selecione um curso ----- </option>';

				        foreach($linhas4 as $linha4) {

				        	echo '<option value="'.$linha4['curso'].'">'.$linha4['curso'].'</option>';

				        }

				        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Salvar</button>
                        <button style="margin-left:30px;" id="cancelaraluno" class="btn" onClick="cancelar();">  Cancelar</button>
                        
                    </div>                   
                </div>

<?php 

try {
    $sql3 = "SELECT id_boletim, curso 
             FROM boletins b 
             INNER JOIN cursos c 
             ON b.id_curso = c.id_curso 
             WHERE id_aluno = ".$_GET['id']." ORDER BY curso ASC";

        $instrucao4 = $conexao->prepare($sql3);
        $instrucao4->execute();
        $linhas6 = $instrucao4->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Cursos Matriculados</h4></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas6 as $linha6) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha6['curso'] . '</td>';

            ?>
            <td> 
                 <button type="button" class="btn" onclick="window.location.href='tratar-excluir-matricula.php?id=<?php echo $linha6['id_boletim']?>&id_aluno=<?php echo $_GET['id'] ?>'">  Excluir</button>
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