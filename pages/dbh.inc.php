<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $dbs = "mysql:host=localhost;dbname=chalkedboard";

    try{
        $pdo = new PDO($dbs, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch(PDOException $e){
        echo "Error occured: " . $e.getMessage();

    }

