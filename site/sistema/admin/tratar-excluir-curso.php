<?php

include('../conexao.php');

$sql = "DELETE FROM cursos WHERE id_curso = :id";
$dados = array('id' => $_GET['id']);

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