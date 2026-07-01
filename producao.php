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

    $SQL = "SELECT producao.DataProducao, producao.DataEntrega, producao.ProducaoID, produtos.Nome AS ProdutoNome, funcionarios.Nome AS NomeFuncionario, clientes.Nome AS ClienteNome FROM producao 
            INNER JOIN produtos ON producao.ProdutoID = produtos.ProdutoID 
            INNER JOIN funcionarios ON producao.FuncionarioID = funcionarios.FuncionarioID 
            INNER JOIN clientes ON producao.ClienteID = clientes.ClienteID;";

    $resultado = mysqli_query($conn, $SQL);
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
    <?php include 'componentes/header.php'?>
    <main class="container">
        <table id="tablefuncionarios" border="1">
            <thead>
                <tr>
                    <th class="titulo-table">Funcionario</th>
                    <th class="titulo-table">E-mail</th>
                    <th class="titulo-table">Ramal</th>
                    <th class="titulo-table">Cargo</th>
                    <th class="titulo-table">Setor</th>
                    <th class="titulo-table">Salário</th>
                </tr>
            </thead>
            <?php while ($SQL_Result = mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td class="table-data"><?php echo $SQL_Result['ProducaoID'];?></td>
                <td class="table-data"><?php echo $SQL_Result['ProdutoNome'];?></td>
                <td class="table-data"><?php echo $SQL_Result['NomeFuncionario'];?></td>
                <td class="table-data"><?php echo $SQL_Result['ClienteNome'];?></td>
                <td class="table-data"><?php echo date("d/m/Y", strtotime($SQL_Result['DataProducao']));?></td>
                <td class="table-data"><?php if ($SQL_Result['DataEntrega'] != NULL) { echo date("d/m/Y", strtotime($SQL_Result['DataEntrega']));} else echo "Em Aberto";?></td>
            </tr>
            <?php }?>
        </table>    
    </main>
</body>
</html>