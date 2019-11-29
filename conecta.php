<?php
    $servername = "localhost";
    $database = "produto";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password, $database);
    if (!$conn){
        die("Conexão falhou:".mysqli_connect_error());
    }
?>