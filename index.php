<?php

// Incluir o arquivo com a conexao com banco de dados
include_once "./conexao.php";

// Criar o cabeçalho para retornar JSON
header("Content-type: application/json; charset=utf-8");

// Buscar no banco de dados os produtos
//$query_produtos = "SELECT id, nome FROM produtos WHERE id = 100";
$query_produtos = "SELECT id, nome FROM produtos";

// Preparar a QUERY
$result_produtos = $conn->prepare($query_produtos);

// Executar a QUERY com PDO
$result_produtos->execute();

// Acessa o IF quando encontrou produto no banco de dados
if (($result_produtos) and ($result_produtos->rowCount() != 0)) {

    // Ler os registros retornado do banco de dados
    $produtos = $result_produtos->fetchAll();

    // Retornar os dados em formato JSON
    echo json_encode(['status' => 200, 'dados' => $produtos]);
} else {
    // Retornar os dados em formato JSON
    echo json_encode(['status' => 404, 'msg' => "Erro: Nenhum produto encontrado!"]);
}
