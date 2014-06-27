<?php include 'header-admin.php'; 

try
{
$sql2 = "SELECT *
         FROM cursos
         WHERE id_curso = ".$_GET['id']." ;";

        $instrucao3 = $conexao->prepare($sql2);
        $instrucao3->execute();
        $linhas4 = $instrucao3->fetchAll();
        $linhas5 = $linhas4[0];
    }

    catch (PDOException $ex) {
    echo $ex->getMessage();
}

try
{
$sql3 = "SELECT id_professor, nome FROM professores ORDER BY nome ;";

        $instrucao4 = $conexao->prepare($sql3);
        $instrucao4->execute();
        $linhas7 = $instrucao4->fetchAll();
    }

    catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>

<div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alterar Curso</h3>
            <form align="left" class="form-horizontal" method="post" action="tratar-alterar-curso.php?id=<?php echo $_GET['id'] ?>" >
                <div class="control-group">
                    <label class="control-label status" for="curso">Curso</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="curso" name="curso" value="<?php echo $linhas5['curso'] ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label status" for="id_professor" > Professor</label>
                    <div class="controls">
                        <?php 
                        echo '<select required style="width: 315px;" name="id_professor"> ';
                        echo '<option value=""> ----- selecione um professor ----- </option>';

                        foreach($linhas7 as $linha7) {

                            echo '<option value="'.$linha7['id_professor'].'">'.$linha7['nome'].'</option>';

                        }

                        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="duracao">Duração</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="duracao" name="duracao" value="<?php echo $linhas5['duracao'] ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="valor">Valor</label>
                    <div class="controls">
                        <input class="span8" type="number" required id="valor" name="valor" value="<?php echo $linhas5['valor'] ?>" >
                        <img id="imglogin" style="display: inline;">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="senha">Plano de Ensino</label>
                    <div class="controls">
                         <textarea required rows="12" name="plano_de_ensino" style="width: 600px;"><?php echo $linhas5['plano_de_ensino']; ?></textarea>
                    </div>
                </div>
               
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Salvar</button>
                        <button style="margin-left:30px;" class="btn" id="cancelarcurso" onClick="cancelar();">  Cancelar</button>
                    </div>                   
                </div>
            </form>

        </div>
      </div>


<?php include 'footer-admin.php'; ?>  