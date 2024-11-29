<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $dbname="turma_a";
    $conexao = mysqli_connect($hostname,$username,$password,$dbname);
    if(mysqli_connect_errno()){
        echo"falha na conexão";
        exit();
    }

?>