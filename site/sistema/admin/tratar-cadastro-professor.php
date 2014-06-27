<?php

header("Content-Type: text/html; charset=utf-8", true);

include('../conexao.php');
    $sql2 = "INSERT INTO professores (login, senha, nome, telefone, email, endereco, rg, cpf)
    values (:login, :senha, :nome, :telefone, :email, :endereco, :rg, :cpf)";

     //'senha' => md5($_POST['senha']),
    if(isset($_POST))
    {
        $dados2 = array(
        'login' => $_POST['login'],
        'senha' => md5($_POST['senha']),
        'nome' => $_POST['nome'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'endereco' => $_POST['endereco'],
        'rg' => $_POST['rg'],
        'cpf' => $_POST['cpf']);  

        try {
        $instrucao2 = $conexao->prepare($sql2);
        $instrucao2->execute($dados2);

        header('Location: professores.php');
        }

        catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    }
$conexao = null;

?>

