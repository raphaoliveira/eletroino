<?php

include('../conexao.php');

$sql = "DELETE FROM boletins WHERE id_boletim = :id";
$dados = array('id' => $_GET['id']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: matricular-aluno.php?id='.$_GET['id_aluno'].'');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

?>