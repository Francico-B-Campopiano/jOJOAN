<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cliente</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Consulta de Cliente por Nome</h1>
        <form action="consulta_nome.php" method="POST" class="mb-4">
            <div class="form-group">
                <label for="txt_nome">Nome:</label>
                <input type="text" name="txt_nome" id="txt_nome" class="form-control" placeholder="Digite o nome do cliente">
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>

        <?php
        include("conexao.php");
        $nome = isset($_POST['txt_nome']) ? $_POST['txt_nome'] : '';
        $sql = "SELECT * FROM cliente WHERE cli_nome LIKE '%$nome%'";
        $executar_sql = mysqli_query($conexao, $sql);

        if (!$executar_sql) {
            die("Erro na consulta SQL: " . mysqli_error($conexao));
        }

        // Se houver resultados, exibe a tabela
        if (mysqli_num_rows($executar_sql) > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($linha = mysqli_fetch_array($executar_sql)) {
                echo "<tr>";
                echo "<td>" . $linha['cli_codigo'] . "</td>";
                echo "<td>" . $linha['cli_nome'] . "</td>";
                echo "<td>" . $linha['cli_email'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='alert alert-warning'>Nenhum cliente encontrado.</p>";
        }

        mysqli_close($conexao);
        ?>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
