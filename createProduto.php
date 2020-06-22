<?php 
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';

    //Trazendo funções validadoras para dentro desse script
    include("includes/validadores.php");

    //Definindo variaveis de validação
    $nomeOk = true;
    $precoOk = true;
    $fotoOk = true;

    //Definindo variaveis com valores dos campos
    $nome = "";
    $preco = "";

    //Verificar se o form foi enviado
    if($_POST) {
      
        //Extraindo valores do $_POST
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        //Verificando campos
        $nomeOk = nomeProdutoOk($_POST['nome']);
        $precoOk = precoProdutoOk($_POST['preco']);
        $fotoOk = uploadArquivosOk($_FILES['foto']);

        //Perguntando se os campos estão ok
        if ($nomeOk && $precoOk && $fotoOk) {
            
            die('Ok! Tudo certo para salvar o produto');

        }
    }


?>

<?php include ("parts/head.php"); ?>

    <main class="mini-container">
 
        <form action="" method="POST" enctype="multipart/form-data">
            <label>
                Nome:
                <input type="text" name="nome" id="nome" value="<?= $nome ?>"> <!-- value="Cesto de Roupa" -->
                <?php if(!$nomeOk): ?> <div class="error">Digite o nome do produto corretamente</div><?php endif; ?> 
            </label>
            <label>
                Descrição:
                <textarea name="desc" id="desc"></textarea>
            </label>
            <label>
                Preço (R$):
                <input type="number" name="preco" id="preco" min="0" step="0.05" value="<?= $preco ?>">
                <?php if(!$precoOk): ?> <div class="error">Digite um preço válido</div><?php endif; ?> 
            </label>
            <label class="fileContainer">
                <img src="img/no-image.png" alt="Imagem Selecionada" id="preview">
                <div>Click para escolher uma imagem</div>
                <input type="file" name="foto" id="foto" >
                <?php if (!$fotoOk): ?> <span class="errorUpload">Selecione um arquivo válido</span> <?php endif; ?>
            </label>

            <div class="controles">
                <button type="reset">Reset</button>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>

    <script>
        (() => {

            let src = document.getElementById("foto");
            var target = document.getElementById("preview");

            // Criando um objeto fileReader
            var fr = new FileReader();

            // Quando o file reader carregar o arquivo, atribua ao src da imagem
            // o arquivo carregado
            fr.onload = function(e) { target.src = this.result; };

            // Quando houver alteração no input file fazer com que o
            // file reader leia o arquivo selecionado
            src.addEventListener("change", function() {
                fr.readAsDataURL(src.files[0]);
            });
        })();
    </script>

<?php include("parts/footer.php"); ?>