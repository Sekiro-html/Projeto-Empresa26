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

    $SQL = "SELECT funcionarios.Nome AS NomeFuncionario, funcionarios.Email, cargos.Nome AS NomeCargo, setor.Nome AS NomeSetor, 
    funcionarios.Salario, funcionarios.Ramal
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
                <td class="table-data"><?php echo $SQL_Result['NomeFuncionario'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Email'];?></td>
                <td class="table-data"><?php echo $SQL_Result['Ramal'];?></td>
                <td class="table-data"><?php echo $SQL_Result['NomeCargo'];?></td>
                <td class="table-data"><?php echo $SQL_Result['NomeSetor'];?></td>
                <td class="table-data">R$ <?php echo $SQL_Result['Salario'];?></td>
            </tr>
            <?php }?>
        </table>    
    </main>
</body>
</html>