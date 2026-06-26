<?php

use const Dom\NOT_FOUND_ERR;

    $servidor = "localhost";
    $user = "root";
    $senha = "";
    $banco = "empresa26";

    $conn = mysqli_connect($servidor, $user, $senha, $banco);

    if(!$conn) {
        die("Conexão deu pal");
    } //echo "conexão foi bem massa";
    mysqli_set_charset($conn, "utf8");

    $ContalinhasFuncionarios = "SELECT COUNT(FuncionarioID) AS FuncionariosContados FROM funcionarios";
    $ContalinhasProdutos = "SELECT COUNT(ProdutoID) AS ProdutosContados FROM produtos";
    $ContalinhasClientes = "SELECT COUNT(ClienteID) AS ClientesContados FROM clientes";
    $MaximoSalario = "SELECT MAX(Salario) AS MaxSalario FROM funcionarios";
    $MinimoSalario = "SELECT MIN(Salario) AS MinSalario FROM funcionarios";

    $Query_Func = mysqli_query($conn, $ContalinhasFuncionarios);
    $Query_Prod = mysqli_query($conn, $ContalinhasProdutos);
    $Query_Clients = mysqli_query($conn, $ContalinhasClientes);
    $Query_Max = mysqli_query($conn, $MaximoSalario);
    $Query_Min = mysqli_query($conn, $MinimoSalario);

    $SQL_Func = mysqli_fetch_assoc($Query_Func);
    $SQL_Prod = mysqli_fetch_assoc($Query_Prod);
    $SQL_Client = mysqli_fetch_assoc($Query_Clients);
    $SQL_Max = mysqli_fetch_assoc($Query_Max);
    $SQL_Min = mysqli_fetch_assoc($Query_Min);
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
    <?php
        include 'componentes/header.php';
    ?>
    <main class="container">
        <div id="div-txt">
            <h1 class="txt" id="titulo-dashboard">Painel da Empresa</h1>
            <span class="txt">Resumo Geral das consultas</span>
        </div>

        <section class="ContainerResultados">
            <ul>
                <li class="list"><span class="txt">Funcionarios</span></li>
                <li class="list"><span class="txt"><?php echo $SQL_Func['FuncionariosContados']; ?></span></li>
            </ul>
        </section>

        <section class="ContainerResultados">
            <ul>
                <li class="list"><span class="txt">Produtos</span></li>
                <li class="list"><span class="txt"><?php echo $SQL_Prod['ProdutosContados']; ?></span></li>
            </ul>
        </section>

        <section class="ContainerResultados">
            <ul>
                <li class="list"><span class="txt">Clientes</span></li>
                <li class="list"><span class="txt"><?php echo $SQL_Client['ClientesContados']; ?></span></li>
            </ul>
        </section>

        <section class="ContainerResultados">
            <ul>
                <li class="list"><span class="txt">Maximo Salario</span></li>
                <li class="list"><span class="txt">R$ <?php echo number_format($SQL_Max['MaxSalario'], 2, ",", "."); ?></span></li>
            </ul>    
        </section>

        <section class="ContainerResultados">
            <ul>
                <li class="list"><span class="txt">Minimo Salario</span></li>
                <li class="list"><span class="txt">R$ <?php echo number_format($SQL_Min['MinSalario'], 2, ",", "."); ?></span></li>
            </ul>
        </section>
    </main>
</body>
</html>