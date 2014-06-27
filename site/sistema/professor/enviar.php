<?php include 'header-professor.php'; ?> 
<div class="row-fluid">
        <div class="span8">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Upload de Arquivos</h3>

<?php 


      if(isset($_POST) && $_POST !== null && $_POST['curso'] !== "")
      {

			$curso = $_POST['curso'];
			
			$tmp_name = $_FILES['arquivo']['tmp_name'];
			$file_name = "[".$curso."] ".$_FILES['arquivo']['name'];

          try
          {
            $sql2 = "SELECT id_curso FROM cursos WHERE curso = '".$curso."' ;";

            $instrucao2 = $conexao->prepare($sql2);
            $instrucao2->execute();
            $linhas2 = $instrucao2->fetchAll();
            $linhas3 = $linhas2[0];

          }
          
          catch (PDOException $ex) {
            exit($ex->getMessage());
        }

          try {
            $sql = "INSERT INTO arquivos (id_curso, nome)
            values (:id_curso, :nome)";

        
            $dados = array(
            'id_curso' => $linhas3['id_curso'],
            'nome' => $file_name);
                
            
            $instrucao = $conexao->prepare($sql);
            $instrucao->execute($dados);

          
        }

        catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    

			echo '	<form  align="left" class="form-horizontal">
						<div class="control-group">
                   			<label class="control-label" for="Nome">Curso</label>
                    			<div class="controls">
                        			<input class="span8" type="text" disabled value="'.$curso.'">
                   				</div>
               			</div>
               			<div class="control-group">
                   			<label class="control-label" for="Arquivo">Arquivo</label>
                    			<div class="controls">
                        			<input class="span8" type="text" disabled value="'.$file_name.'">
                   				</div>
               			</div> ';



				
				if(move_uploaded_file($tmp_name, '../files/'.$file_name.'')){
					echo '	<div class="control-group">
                   				<label class="control-label" for="Nome">Status</label>
                    				<div class="controls">
                        				<input class="span8" type="text" disabled value="Upload bem sucedido!">
                   					</div>
               				</div>
               				<div class="control-group">
                    			<div class="controls">
                        			<a href="../files/'.$file_name.'" target="_blank" class="btn"> Exibir</a>
                        			<a href="uploads.php" style="margin-left:30px;" class="btn"> Voltar</a>
                    			</div>                   
                			</div>
                		</form>';
				}
				else{
					echo '  <div class="control-group">
                   				<label class="control-label" for="Nome">Status</label>
                    				<div class="controls">
                        				<input class="span8" type="text" disabled value="Arquivo não enviado!">
                   					</div>
               				</div>
							<div class="control-group">
                    			<div class="controls">
									<a href="uploads.php" class="btn"> Voltar</a>
                    			</div>                   
                			</div>
                	</form>';
				} 
				?>

		</div>
</div>

<?php } ?>

<?php $conexao = null; ?>
				
<?php include 'footer-professor.php'; ?>  
