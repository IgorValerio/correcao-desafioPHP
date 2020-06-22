<?php 

function nomeProdutoOk($nome){
    return gettype($nome) == "string" && strlen($nome) > 0; // retorna uma string contendo o tipo dessa variável.
}

function precoProdutoOk($preco){
    return is_numeric($preco) && $preco>0;
}

function uploadArquivosOk($arquivo){
    
    switch ($arquivo['error']) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
        case UPLOAD_ERR_PARTIAL:
        case UPLOAD_ERR_NO_FILE:
        case UPLOAD_ERR_NO_TMP_DIR:
        case UPLOAD_ERR_CANT_WRITE:
        case UPLOAD_ERR_EXTENSION:
            return false;            
        break;

        case UPLOAD_ERR_OK:
            return true;            
        break;
    }

}

?>