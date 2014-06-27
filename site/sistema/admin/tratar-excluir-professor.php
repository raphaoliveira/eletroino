<?php

include('../conexao.php');

$sql = "DELETE FROM professores WHERE id_professor = :id ;";
$dados = array('id' => $_GET['id']);

try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    
    header('Location: professores.php');
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}

$conexao = null;

?>