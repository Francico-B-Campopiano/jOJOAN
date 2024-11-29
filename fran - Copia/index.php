<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
  <div >
    <h1 class="text-center">Cadastro De Clientes</h1>
    <div class="col-6 offset-md-3">
    <form action="index.php" method="POST">
        Nome:   <input class="form-control" type="text" name="txt_nome"><br>
        Endereço:   <input class="form-control" type="text" name="txt_end"><br>
        Email:  <input class="form-control" type="email" name="txt_email"><br>
        Cep:    <input class="form-control" type="text" name="txt_cep"><br>
        Telefone:   <input class="form-control" type="tel" name="txt_tel"><br>
        Login:  <input class="form-control" type="text" name="txt_login"><br>
        senha:  <input class="form-control" type="password" name="txt_senha"><br>
    </div>     
            <div class="text-center">
                <input class="btn btn-primary" type="submit" name="Btn_Salvar" value="Salvar">
                <input class="btn btn-warning"type="submit" name="Btn_Editar" value="Editar">    
                <input class="btn btn-primary"type="submit" name="btn_consultar" value="Consultar">    
                <input class="btn btn-danger" type="submit" name="Btn_Excluir" value="Excluir"> 
                
            </div>
    </form>

   </div>
   <form>
       <?php
            if(count($_POST) > 0){
            if($_POST['btn_consultar']) {
            header('location:consulta.php');
            exit();
         
        }
        else{
            include ('conexao.php');
            $nome=$_POST['txt_nome'];
            $end=$_POST['txt_end'];
            $cep=$_POST['txt_cep'];
            $tel=$_POST['txt_tel'];
            $email=$_POST['txt_email'];
            $login=$_POST['txt_login'];
            $senha=$_POST['txt_senha'];  
            $sql_inserir="insert into cliente(cli_nome, cli_endereco, cli_cep, cli_telefone, cli_email, cli_login, cli_senha) values ('$nome','$end','$cep','$tel','$email','$login','$senha')";
            $executar_query= mysqli_query($conexao, $sql_inserir); //executar a sql de inserir

               if($executar_query){
                   echo "Cliente inserido com sucesso";
                   mysqli_close ($conexao);
               }

               else{
                   echo "Erro ao cadastrar o cliente";
                   mysqli_close ($conexao);
               }
            }
        }
        
       ?>
       
   </form>
</body>
</html>