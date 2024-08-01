<?php
    $dbHost = "Localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "judite";

    $conexao = new mysqli( $dbHost, $dbUsername,  $dbPassword,  $dbName);
    if(!$conexao){
        die("Houve um erro: " .mysqli_connect_error());
    }
?>