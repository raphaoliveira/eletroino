<?php

include('../conexao.php');

$sql = "DELETE FROM alunos WHERE id_aluno = :id";
$dados = array('id' => $_GET['id']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: alunos.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

?>