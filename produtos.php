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

    $codigo_produtos = 'SELECT produtos.Nome AS NomeProduto, categorias.Nome AS NomeCategoria,  produtos.Preco AS Preco FROM produtos 
                        INNER JOIN categorias ON produtos.CategoriaID = categorias.CategoriaID';
    $SQL_Prod = mysqli_query($conn, $codigo_produtos);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'componentes/header.php' ?>
    <main class="container">
        <?php while ($ResultSQL = mysqli_fetch_assoc($SQL_Prod)) { ?>
        <article class="ContainerProd">
            <h1 class="txt-nome"><?php echo $ResultSQL['NomeProduto'];?></h1>
            <p class="txt-categoria"><?php echo $ResultSQL['NomeCategoria'];?></p>
            
            <span class="txt-price">R$ <?php echo number_format($ResultSQL['Preco'], 2, ",", ".");?></span>
            <a href="produto-detalhe.php" class="anchorProd" id="removealinhamento"">Ver Detalhes</a>
        </article>
        <?php };?>
    </main>
</body>
</html>