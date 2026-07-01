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

    $SQL = "SELECT funcionarios.Nome, funcionarios.Email, cargos.Nome, setor.Nome, funcionarios.Salario, funcionarios.Ramal 
    FROM funcionarios 
    INNER JOIN cargos ON funcionarios.CargoID = cargos.CargoID
    INNER JOIN setor ON funcionarios.SetorID = funcionarios.SetorID;";

    $resultado = mysqli_query($conn, $SQL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'componentes/header.php'?>
    <main class="container">
        <table>
            <tr>
                <td>Funcionario</td>
                <td>E-mail</td>
                <td>Ramal</td>
                <td>Cargo</td>
                <td>Setor</td>
                <td>Salário</td>
            </tr>
            <?php while($SQL_Result = mysqli_fetch_assoc($resultado)) { ?>
            <tr></tr>
            <?php }?>
        </table>    
    </main>
</body>
</html>