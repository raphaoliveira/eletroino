<?php

// Define o tempo máximo de execução em 0 para as conexões lentas
set_time_limit(0);

// Arqui você faz as validações e/ou pega os dados do banco de dados

$arquivoNome = $_POST['arquivo']; // nome do arquivo que será enviado p/ download
$caminho = "../files/".$arquivoNome;
// Verifica se o arquivo não existe



if (!file_exists($caminho)) {
// Exiba uma mensagem de erro caso ele não exista
exit("404");
}

// Aqui você pode aumentar o contador de downloads


// Configuramos os headers que serão enviados para o browser
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$arquivoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($caminho));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');

// Envia o arquivo para o cliente
readfile($caminho);

?>