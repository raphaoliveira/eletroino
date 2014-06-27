<?php

include('../conexao.php');

$sql = "DELETE FROM administradores WHERE id_administrador = :id";
$dados = array('id' => $_GET['id']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: administradores.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

?>