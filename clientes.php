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

    $SQL = "SELECT Nome, Email, Telefone, Cidade, Estado, ClienteID, Empresa FROM clientes";

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
                    <th class="titulo-table">ID</th>
                    <th class="titulo-table">Empresa</th>
                    <th class="titulo-table">Contato</th>
                    <th class="titulo-table">E-mail</th>
                    <th class="titulo-table">Telefone</th>
                    <th class="titulo-table">Cidade</th>
                    <th class="titulo-table">UF</th>
                </tr>
            </thead>
            <?php while ($SQL_Result = mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td class="table-data"><?php echo $SQL_Result['ClienteID'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Empresa'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Nome'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Email'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Telefone'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Cidade'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Estado'];?></td>
            </tr>
            <?php }?>
        </table>    
    </main>
</body>
</html>