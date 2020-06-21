<?php 

function nomeProdutoOk($nome){
    return gettype($nome) == "string" && strlen($nome) > 0; // retorna uma string contendo o tipo dessa variável.
}

function precoProdutoOk($preco){
    return is_numeric($preco) && $preco>0;
}

?>