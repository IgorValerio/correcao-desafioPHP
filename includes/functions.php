<?php 

define("ARQUIVO_PRODUTOS",__DIR__."/../databases/produtos.json");

function getProdutos(){

    // Ler o conteudo do arquivo para uma string
    $str = file_get_contents(ARQUIVO_PRODUTOS);

    // Transformar essa string em um array associativo
    $produtos = json_decode($str, true);

    // Retorna array associativo
    return $produtos;

}

echo "<pre>";
print_r(getProdutos());
echo "</pre>";
