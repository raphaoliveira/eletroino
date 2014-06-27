<?php include 'header-professor.php'; ?> 

<?php
try
{

$sql = "SELECT * FROM cursos WHERE 
            id_professor = (SELECT id_professor FROM professores WHERE login = '".$_SESSION['login']."')
            ORDER BY curso ASC";

        $instrucao3 = $conexao->prepare($sql);
        $instrucao3->execute();
        $linhas4 = $instrucao3->fetchAll();
    }

    catch (PDOException $ex) {
    echo $ex->getMessage();
}

?>

<div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Upload de Arquivos</h3>
            <form  align="left" class="form-horizontal" action="enviar.php" method="post" enctype="multipart/form-data">
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
                    <label class="control-label status" for="upload">Upload</label>
                    <div class="controls">
                        <input class="span8" type="file" required id="arquivo" name="arquivo">
                    </div>
                </div>
                 <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Enviar</button>
                        <button style="margin-left:30px;" class="btn" id="cancelarcadastro" onClick="cancelar();">  Voltar</button>
                    </div>
                </div>
            </form>
         </div>
</div>


<?php include 'footer-professor.php'; ?>  