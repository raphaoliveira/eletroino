<?php

header("Content-Type: text/html; charset=utf-8", true);

include('../conexao.php');
    $sql2 = "INSERT INTO administradores (login, senha, nome, telefone, email)
    values (:login, :senha, :nome, :telefone, :email)";

     //'senha' => md5($_POST['senha']),
    if(isset($_POST))
    {
        $dados2 = array(
        'login' => $_POST['login'],
        'senha' => md5($_POST['senha']),
        'nome' => $_POST['nome'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email']);
            
        try {
        $instrucao2 = $conexao->prepare($sql2);
        $instrucao2->execute($dados2);

        header('Location: administradores.php');
        }

        catch (PDOException $ex) {
            exit($ex->getMessage());
        }
    }
$conexao = null;

?>

