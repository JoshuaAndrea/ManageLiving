<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("location: management.php");
    exit;
}

require_once "config.php";

try {
    $connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
}
catch (PDOException $e)
{
    echo $e->getMessage();
}

$error = "";
$username = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = "SELECT id, username, password FROM admins WHERE username=:username AND password=:password";

    $step = $connection->prepare($query);

    $step->bindParam(':username', $username);
    $step->bindParam(':password', $password);

    $step->execute();

    if($step->rowCount() == 1) {
        $row = $step->fetch();

        $id = $row["id"];
        $username = $row["username"];
        $password = $row["password"];

        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        header("location: management.php");
    }
    else
        $error = "Invalid credentials";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <h1 class="text-center">Login page</h1>
            <div class="card bg-light">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <label class="m-2 text-danger"><?php echo $error?></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>