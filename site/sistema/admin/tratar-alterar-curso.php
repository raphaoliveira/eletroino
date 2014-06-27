<?php

include('../conexao.php');

    $sql = "UPDATE cursos 
    SET curso = :curso, id_professor = :id_professor, duracao = :duracao, valor = :valor, plano_de_ensino = :plano_de_ensino 
    WHERE id_curso = :id";

    $dados = array(
    'id' => $_GET['id'],
    'curso' => $_POST['curso'],
    'id_professor' => $_POST['id_professor'],
    'duracao' => $_POST['duracao'],
    'valor' => $_POST['valor'],
    'plano_de_ensino' => $_POST['plano_de_ensino']);

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: cursos.php');
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }

    $conexao = null;

?>