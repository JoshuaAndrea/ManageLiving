<?php
require_once("dbconfig.php");

$connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);

$result = $connection->query("SELECT * FROM posts");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Guestbook</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>Guestbook</h1>

        <h1>Write something in our guest book!</h1>

        <form method="POST">
            <div>
                <label>Name: </label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Message: </label>
                <textarea name="message"></textarea>
            </div>
            <div>
                <label>&nbsp;</label>
                <input type="submit" value="Send"/>
            </div>
        </form>

        <?php
            foreach($result as $row){
        ?>

        <div class="post">
            <h3> <?= $row['name'] ?> wrote: </h3>
            <p> <?= $row['message'] ?> </p>
            <p> <?= $row['posted_at']?> </p>
        </div>
       
        <?php
            }
        ?>
    </body>


</html>