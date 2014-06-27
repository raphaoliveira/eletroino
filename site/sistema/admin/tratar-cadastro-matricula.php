<?php

header("Content-Type: text/html; charset=utf-8", true);

include('../conexao.php');

    
    $sql = "SELECT id_curso FROM cursos WHERE curso = '".$_POST['curso']. "' ;";
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute();
    $linhas = $instrucao->fetchAll();
    $linhas2 = $linhas[0];

    $sql2 = "INSERT INTO boletins (id_aluno, id_curso)
    values (:id_aluno, :id_curso)";

        $dados2 = array(
        'id_aluno' => $_GET['id'],
        'id_curso' => $linhas2['id_curso']);
            
        try {
        $instrucao2 = $conexao->prepare($sql2);
        $instrucao2->execute($dados2);

        header('Location: matricular-aluno.php?id='.$_GET['id'].'');
        }

        catch (PDOException $ex) {
            exit($ex->getMessage());
        }

$conexao = null;

?>

