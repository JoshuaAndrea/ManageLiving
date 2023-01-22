<?php
include __DIR__ . '/../header.php';
?>

<form method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <h2 class=text-center>Login For Employees</h2>
                <div class="card bg-light">
                    <div class="card-body">
                        <div id=errorbox class=form-errors>
                            <ul></ul>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button id="loginButton" name="loginRequest" type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src = "js/LoginForm"></script>

<?php
include __DIR__ . '/../footer.php';
?>