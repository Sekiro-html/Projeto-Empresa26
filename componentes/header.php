<?php 
    include '../conexao.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <nav>
            <div id="navbar-superior">
                <img src="../IMG/hamburger.png" id="IMGHEADER" alt="">
                <span id="txt">Painel da Empresa</span>
                <input type="search" placeholder="Pesquisar" name="" id="searchbar">
            </div>
            <u id="navbar-links">
                <li class="list"><div class="links" id="firstdiv"><a href="../index.php" class="anchor">DashBoard</a></div></li>
                <li class="list"><div class="links"><a href="../produtos.php" class="anchor">Produtos</a></div></li>
                <li class="list"><div class="links"><a href="../funcionarios.php" class="anchor">Funcionarios</a></div></li>
                <li class="list"><div class="links"><a href="../clientes.php" class="anchor">Clientes</a></div></li>
                <li class="list"><div class="links"><a href="../producao.php" class="anchor">Produção</a></div></li>
                <li class="list"><div class="links"><a href="#" class="anchor">Relatórios</a></div></li>
                <li class="list"><div class="links"><a href="#" class="anchor">Configurações</a></div></li>
                <li class="list"><div class="links"><a href="#" class="anchor">Sair</a></div></li>
            </u>
        </nav>
    </header>
</body>
</html>