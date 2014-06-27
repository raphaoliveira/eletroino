<?php

include('../conexao.php');

if(isset($_POST['senha']) && $_POST['senha'] != '')
{

$sql = "UPDATE alunos 
        SET nome = :nome, telefone = :telefone, email = :email, senha = :senha, endereco = :endereco, rg = :rg, cpf = :cpf 
        WHERE id_aluno = :id";

$dados = array(
    'id' => $_GET['id'],
    'nome' => $_POST['nome'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email'],
    'senha' => md5($_POST['senha']),
    'endereco' => $_POST['endereco'],
    'rg' => $_POST['rg'],
    'cpf' => $_POST['cpf']);

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: index-aluno.php');
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }
}

else
{
    $sql = "UPDATE alunos 
            SET nome = :nome, telefone = :telefone, email = :email, endereco= :endereco, rg = :rg, cpf = :cpf 
            WHERE id_aluno = :id";

    $dados = array(
    'id' => $_GET['id'],
    'nome' => $_POST['nome'],
    'telefone' => $_POST['telefone'],
    'email' => $_POST['email'],
    'endereco' => $_POST['endereco'],
    'rg' => $_POST['rg'],
    'cpf' => $_POST['cpf']);

    try {
    $instrucao = $conexao->prepare($sql);
    $instrucao->execute($dados);

    header('Location: index-aluno.php');
    }
    catch (PDOException $ex) {
        exit($ex->getMessage());
    }
}
    $conexao = null;

?>