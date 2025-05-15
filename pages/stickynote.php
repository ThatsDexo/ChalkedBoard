<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = $_POST["message"];
    $name = $_POST["name"];

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO messages (message, name) VALUES(:message, :name)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":message", $message);
        $stmt->bindParam(":name", $name);

        $stmt->execute();

        $pdo = null;
        $stmt = null;
        die();

        header("location: ../index.php");

    }catch(PDOException $e){
        echo "Error occured: " . $e->getMessage();
        die();
    }
}
else{
    echo "Error occured: " . $e->getMessage();
    header("location: ../index.php");
}