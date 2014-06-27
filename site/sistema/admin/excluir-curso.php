<?php include 'header-admin.php'; ?>  

<?php include('../conexao.php');

try {

    $sql = "SELECT id_curso, curso, nome, duracao, valor, plano_de_ensino
            FROM cursos c 
            LEFT JOIN professores p 
            ON p.id_professor = c.id_professor 
            WHERE id_curso LIKE :id ";

    $instrucao = $conexao->prepare($sql);
    $dados = array('id' => $_GET['id']);
    $instrucao->execute($dados);
    $linhas = $instrucao->fetchAll();

    foreach($linhas as $linha) {

?>

    <div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Excluir Cadastro de Curso</h3>
            <form align="left" class="form-horizontal" method="post" action="tratar-excluir-curso.php?id=<?php echo $linha['id_curso']?>" >
                <div class="control-group">
                    <label class="control-label status" for="curso">Curso</label>
                    <div class="controls">
                        <input class="span8" type="text" disabled id="curso" name="curso" value="<?php echo $linha['curso'] ?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label status" for="id_professor" > Professor</label>
                    <div class="controls">
                        <input class="span8" type="text" disabled id="id_professor" name="id_professor" value="<?php echo $linha['nome'] ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="duracao">Duração</label>
                    <div class="controls">
                        <input class="span8" type="text" disabled id="duracao" name="duracao" value="<?php echo $linha['duracao'] ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="valor">Valor</label>
                    <div class="controls">
                        <input class="span8" type="number" disabled id="valor" name="valor" value="<?php echo $linha['valor'] ?>" >
                        <img id="imglogin" src="" style="display: inline;">
                    </div>
                </div>
               
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Excluir</button>
                        <button style="margin-left:30px;" class="btn" id="cancelarcurso" onClick="cancelar();">  Cancelar</button>
                    </div>                   
                </div>
            </form>

        </div>
      </div>
         

    <?php 

        }

    }
    catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    $conexao = null;
    ?>

<?php include 'footer-admin.php'; ?>  