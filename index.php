<?php 
    $ContalinhasFuncionarios = "SELECT SUM(FuncionarioID) AS FuncionariosContados FROM funcionarios";
    
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
            <span></span>
            <span></span>
        </section>
        <section class="ContainerResultados"></section>
        <section class="ContainerResultados"></section>
        <section class="ContainerResultados"></section>
        <section class="ContainerResultados"></section>
    </main>
</body>
</html>