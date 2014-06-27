<?php include 'header-admin.php'; ?> 

    <div style="float:left;">
    <form method="post" action="buscar-curso.php">
        <input type="text" style="width:400px;height:25px;" name="q" placeholder="Pesquise pelo Nome do curso">
        <input type="submit" class="btn" value="Buscar">
    </form> 
    </div>
    <div style="float:right;">
    <form action="cadastrar-curso.php">
        <input type="submit" class="btn" value="Adicionar Curso">
    </form> 
    </div>

<?php

include('../conexao.php');

try {
    $sql = "SELECT id_curso, curso, nome, duracao, valor 
            FROM cursos c 
            LEFT JOIN professores p 
            ON p.id_professor = c.id_professor 
            ORDER BY curso ;";

        $instrucao2 = $conexao->prepare($sql);
        $instrucao2->execute();
        $linhas2 = $instrucao2->fetchAll();

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo ' <th><h4>Curso</h4></th>';
        echo ' <th><h4>Professor</h4></th>';
        echo ' <th><h4>Duração</h4></th>';
        echo ' <th><h4>Valor</h4></th>';
        echo ' <th style="float: right;"><h4>Ações</h4></th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($linhas2 as $linha2) {
            echo '<tr class="warning">';
            echo '  <td>' . $linha2['curso'] . '</td>';
            echo '  <td>' . $linha2['nome'] .  '</td>';
            echo '  <td>' . $linha2['duracao'] . '</td>';
            echo '  <td>' . $linha2['valor'] .  '</td>';

            ?>
            <td> 
                <button type="button" class="btn" onclick="window.location.href='alterar-curso.php?id=<?php echo $linha2['id_curso'] ?>'">  Alterar</button>
            </td>
            <td> 
                 <button type="button" class="btn" onclick="window.location.href='excluir-curso.php?id=<?php echo $linha2['id_curso'] ?>'">  Excluir</button>
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