<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Consulta de Cliente</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("conexao.php");
                $consultar = "SELECT * FROM cliente";
                $executar = mysqli_query($conexao, $consultar);

                while ($linha = mysqli_fetch_array($executar)) {
                    echo "<tr>";
                    echo "<td>" . $linha['cli_codigo'] . "</td>";
                    echo "<td>" . $linha['cli_nome'] . "</td>";
                    echo "<td>" . $linha['cli_email'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($conexao);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
