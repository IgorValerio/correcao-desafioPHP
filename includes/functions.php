<?php 

define("ARQUIVO_PRODUTOS",__DIR__."/../databases/produtos.json");
define("PASTA_DE_FOTOS",__DIR__."/../img/produtos");

function getProdutos(){

    // Ler o conteudo do arquivo para uma string
    $str = file_get_contents(ARQUIVO_PRODUTOS);

    // Transformar essa string em um array associativo
    $produtos = json_decode($str, true);

    // Retorna array associativo
    return $produtos;

}

function addProduto($nome, $preco, $desc, $tmpFoto, $userFoto){

    // Definir nome único para o arquivo da foto
    $destNome = uniqid().'-'.$userFoto;

    // Salvar a foto no destino
    move_uploaded_file($tmpFoto, PASTA_DE_FOTOS.$destNome);
    
    // Carregando o array de produtos
    $produtos = getProdutos();

    // Determinar o id do produto novo
    if (count($produtos) == 0) {
        $novoId = 1;
    } else {
        // Pegar o id do ultimo produto
    $ultimoProduto = $produtos[count($produtos) - 1];

        // Adiciona 1 ao id do ultimo produto
        $novoId = $ultimoProduto['id'] + 1;
    }

    // Criando o elemento $produto
    $produto = [
        "id" => $novoId,
        "nome" => $nome,
        "preco" => $preco,
        "desc" => $desc,
        "foto" => $destNome
    ];

    // Adicionar produto ao final do array
    $produtos[] = $produto;

    // Trasnformando o array de volta para string
    $str = json_encode($produtos);

    // Salvando a string no arquivo
    file_put_contents(ARQUIVO_PRODUTOS, $str);
}