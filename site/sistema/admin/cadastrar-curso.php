<?php include 'header-admin.php'; 

try
{
$sql2 = "SELECT id_professor, nome FROM professores ORDER BY nome ;";

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
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cadastro de Curso</h3>
            <form align="left" class="form-horizontal" method="post" action="tratar-cadastro-curso.php" >
                <div class="control-group">
                    <label class="control-label status" for="curso">Curso</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="curso" name="curso" placeholder="Nome do Curso">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label status" for="id_professor" > Professor</label>
                    <div class="controls">
                        <?php 
                        echo '<select required style="width: 315px;" name="id_professor"> ';
                        echo '<option value=""> ----- selecione um professor ----- </option>';

                        foreach($linhas4 as $linha4) {

                            echo '<option value="'.$linha4['id_professor'].'">'.$linha4['nome'].'</option>';

                        }

                        echo '</select>';
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="duracao">Duração</label>
                    <div class="controls">
                        <input class="span8" type="text" required id="duracao" name="duracao" placeholder="Ex: 50 horas/aula" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="valor">Valor</label>
                    <div class="controls">
                        <input class="span8" type="number" required id="valor" name="valor" placeholder="Valor" >
                        <img id="imglogin"  style="display: inline;">
                    </div>
                </div>
                 <div class="control-group">
                    <label class="control-label" for="senha">Plano de Ensino</label>
                    <div class="controls">
                         <textarea required rows="12" name="plano_de_ensino" style="width: 600px;">
                         </textarea>
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