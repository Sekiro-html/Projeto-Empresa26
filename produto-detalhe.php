<?php 
    $servidor = "localhost";
    $user = "root";
    $senha = "";
    $banco = "empresa26";

    $conn = mysqli_connect($servidor, $user, $senha, $banco);

    if(!$conn) {
        die("Conexão deu pal");
    } //echo "conexão foi bem massa";
    mysqli_set_charset($conn, "utf8");

    $id = 0;
    if (isset($_GET["id"])) {
        $id = intval($_GET["id"]);
    }
    $SQL =  "SELECT
            produtos.ProdutoID, produtos.Nome AS NomeProduto, produtos.Preco, produtos.Referencia, produtos.Descricao, produtos.Peso,
            categorias.Nome AS NomeCategoria FROM produtos
            INNER JOIN categorias
            ON produtos.CategoriaID = categorias.CategoriaID
            WHERE produtos.ProdutoID = $id";

    $Resultado = mysqli_query($conn, $SQL);

    $SQL_Result = mysqli_fetch_assoc($Resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include 'componentes/header.php' ?>
    <main class="container">
        <div id="detalhe">Detalhe do Produto</div>
        <div id="containerProduto-detalhe">
            <h1 id="detalhe-nome"><?php echo $SQL_Result['NomeProduto']; ?></h1>
            <p class="detalhe-info">Categoria: <?php echo $SQL_Result['NomeCategoria']; ?></p>
            <p class="detalhe-info">Referencia: <?php echo $SQL_Result['Referencia']; ?></p>
            <p class="detalhe-info">Peso: <?php echo $SQL_Result['Peso']; ?></p>
            <span id="detalhe-preco">R$ <?php echo $SQL_Result['Preco']; ?></span>
        </div>
    </main>
</body>
</html>