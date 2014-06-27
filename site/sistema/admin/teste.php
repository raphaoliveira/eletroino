<?php

include('../conexao.php');

$sql = "SELECT login FROM administradores";
$instrucao2 = $conexao->prepare($sql);
$instrucao2->execute();
$linhas2 = $instrucao2->fetchAll();

$key = 0;

foreach ($linhas2 as $linhas2) {
	$linhas3[$key] = $linhas2['login'];
	$key++;
}

$string_array = implode("|", $linhas3);

var_dump($string_array);

?>