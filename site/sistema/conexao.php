<?php

$usuarios = 'root';
$senha = '';

try {
    $conexao = new PDO("mysql:host=localhost;dbname=escolatcc", $usuarios, $senha);
}
catch (PDOException $ex) {
    exit($ex->getMessage());
}