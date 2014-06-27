<?php

include('../conexao.php');

$sql = "UPDATE boletins SET nota = :nota, falta = :falta WHERE id_boletim = :id";
$id_curso = $_POST['id_curso'];

//var_dump($_POST['id_boletim']);

$dados = array(
    'id' => $_POST['id_boletim'],
    'nota' => $_POST['nota'],
    'falta' => $_POST['falta']);

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: boletim.php?id='.$id_curso);
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }

    $conexao = null;

?>