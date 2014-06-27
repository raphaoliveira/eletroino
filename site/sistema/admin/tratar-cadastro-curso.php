<?php

header("Content-Type: text/html; charset=utf-8", true);

include('../conexao.php');
    $sql2 = "INSERT INTO cursos (id_professor, curso, duracao, plano_de_ensino, valor)
    values (:id_professor, :curso, :duracao, :plano_de_ensino, :valor)";

    if(isset($_POST))
    {
        $dados2 = array(
        'id_professor' => $_POST['id_professor'],
        'curso' => $_POST['curso'],
        'duracao' => $_POST['duracao'],
        'plano_de_ensino' => $_POST['plano_de_ensino'],
        'valor' => $_POST['valor']);
            
        try {
        $instrucao2 = $conexao->prepare($sql2);
        $instrucao2->execute($dados2);

        header('Location: cursos.php');
        }

        catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    }
$conexao = null;

?>

