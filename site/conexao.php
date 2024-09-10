<?php
    // Variáveis com os dados do Banco de Dados Hospedado em um servidor Local
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "dbGalaxyStars";

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Teste de Conexão
    if($conn->connect_error){
        die("Conexão falhou!!" . $conn->connect_error);
    }
?>