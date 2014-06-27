<?php include 'header-aluno.php'; ?> 


<?php


    $sql2 = "SELECT id_curso FROM boletins WHERE id_aluno = ".$_GET['id_aluno']." ;";

    $instrucao2 = $conexao->prepare($sql2);
    $instrucao2->execute();
    $linhas2 = $instrucao2->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th width=50%><h4>Arquivo</h4></th>';
        echo ' <th><h4>Tamanho</h4></th>';
        //  echo ' <th><h4>Data de Envio</h4></th>';
        echo ' <th><h4>Download</h4></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

    foreach($linhas2 as $linha2) {

    $sql = "SELECT nome FROM arquivos
            WHERE id_curso = ".$linha2['id_curso']." ;";
    
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute();
    $linhas = $instrucao->fetchAll();

//$dh = dir ("files");
	foreach($linhas as $linha)
        {
        //while ($entrada = $dh->read()) {
                if($linha['nome'] !== "" && $linha['nome'] !== null)
                {

                $entrada = $linha['nome'];
                $caminho = "../files/".$entrada;
                        if($entrada != '.' && $entrada != '..'){
                                echo '<tr class="warning">';
                                echo '<td width=50%;>' . $entrada . '</td>';
                                echo '<td>' .number_format((filesize($caminho)/1024),2). ' Kb</td>';
                                //  echo '<td> DD/MM/AAAA </td>';
                                echo '<td><form method="post" action="forcar-download.php">';
                                echo '<input type="hidden" id="arquivo" name="arquivo" value="'.$entrada.'" />';
                                echo '<button type="submit" class="btn btn-default btn-lg"><span class="icon-download-alt"></span></button></a></form></td>';
                                echo '</tr>';
                                
                                clearstatcache();
                        }

                }
        }

        
}

        echo '</tbody>';
        echo '</table>';//$dh->close();
?>

<?php include 'footer-aluno.php'; ?>  