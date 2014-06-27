<?php

include('../conexao.php');

if(isset($_POST['senha']) && $_POST['senha'] != '')
{
    $sql = "UPDATE administradores SET nome = :nome, telefone = :telefone, email = :email, senha = :senha WHERE id_administrador = :id";

    $dados = array(
    'id' => $_GET['id'],
    'nome' => $_POST['nome'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email'],
    'senha' => md5($_POST['senha']));

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: administradores.php');
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }
}

else
{
    $sql = "UPDATE administradores SET nome = :nome, telefone = :telefone, email = :email WHERE id_administrador = :id";

    $dados = array(
    'id' => $_GET['id'],
    'nome' => $_POST['nome'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email']);

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: administradores.php');
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }
}


    $conexao = null;

?>