<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = $_POST["message"];
    $name = $_POST["name"];

    $cat_poster_file = "cat" . rand(1,6) . ".jpg";
    
    

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO wall (message, name, cat_poster_file) VALUES(:message, :name, :cat_poster_file)";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":cat_poster_file", $cat_poster_file);
        $stmt->bindParam(":message", $message);
        $stmt->bindParam(":name", $name);
    
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        

        header("location: ../index.php");
        die();

    }catch(PDOException $e){
        echo "Error occured: " . $e->getMessage();
        die();
    }
}
else{
    echo "Error occured: " . $e->getMessage();
    header("location: ../index.php");
}