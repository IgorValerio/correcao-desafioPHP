<?php include("parts/head.php"); ?>
<?php include("includes/functions.php"); ?>
<?php 
    $produtos = getProdutos();
?>
<table>
    <thead>
        <tr>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Preço</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($produtos as $p): ?>
        <tr>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['desc'] ?></td>
            <td><?= number_format($p['preco'],2,',','.')  ?></td>
            <td><a href="showProduto.php?id=<?= $p['id']; ?>">Destalhes</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include("parts/footer.php"); ?>


