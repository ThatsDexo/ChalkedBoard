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
    <h1>Motivational Board</h1>
    <div class="cat_window">
        <?php
            foreach($result as $row) {
                echo "<div class='poster' style='position: absolute; left:" . rand(1, 80) . "%; bottom:" . rand(10, 75) . "%;'> 
                    <img src='images/" . htmlspecialchars($row["cat_poster_file"]) . "'>
                    <div class='quote'>
                        <h2>" . htmlspecialchars($row["message"]) . "</h2>
                        <h3>-" . htmlspecialchars($row["name"]) . "</h3>
                    </div>
                </div>";
            }
        ?>
    </div>

    <section class="bottom-section">
            <form class="user-form" method= "post" action="pages/stickynote.php">
                <div class="form-box">
                    <input type="text" id="message" name="message" placeholder="Enter your message">
                </div class="form-box">
                <div class="form-box">
                    <input type="text" id="name" name ="name" placeholder="Enter your name">
                </div class="form-box">
                <div>
                    <input type="submit" value="Post">
                </div>
            </form>
        
    </section>
</body>
</html>