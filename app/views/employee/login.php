<?php
include __DIR__ . '/../header.php';
$error = "";
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <h2 class=text-center>Login For Employees</h2>
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

<?php
include __DIR__ . '/../footer.php';
?>