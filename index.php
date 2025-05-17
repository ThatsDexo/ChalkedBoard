<?php
    require_once "pages/dbh.inc.php";
    $query = "SELECT * FROM wall;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo print_r($result);
    // echo "<br>";
    // echo $result[0]["message"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chalked Board</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
        foreach($result as $row) {
           echo "<div class=poster style=\"position=relative; left:" . rand(1, 100) . "%; bottom:"
            . rand(5, 100) . "%;\"> 
            <img src=\"images/" . $row["cat_poster_file"] . "\">
            <p>" . $row["message"] . "</p>
            </div>";
        }
    ?>
    <section>
            <form id="user-form" method= "post" action="pages/stickynote.php">
                <div class="form-box">
                    <input type="text" id="message" name="message" placeholder="Enter your message">
                </div class="form-box">
                <div class="form-box">
                    <input type="text" id="name" name ="name" placeholder="Enter your name">
                </div class="form-box">
                    <input type="submit" value="Post">
             
            </form>
        </div>
    </section>
</body>
</html>