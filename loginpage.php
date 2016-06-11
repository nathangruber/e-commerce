<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html lang="en">
<?php require_once 'includes/header.php';?>

<head>
    <title>Login Page</title>
</head>

<body>
    <?php require_once 'includes/navbar.php';?>

 <!--   <div class="container">
        <div class="starter-template">
            <p class="lead">Enter Username and Password to login.<br></p>
        </div>

        <div>
            <form action="includes/login.php" method="post">
                <input type="text" name="username" placeholder="username"> <input type="password" name="password" placeholder="password"> <input class="btn btn-default" type="submit" value="Login">
            </form>
        </div>

        <div>
            <p>No Account? Register below</p>
        </div>

        <div>
            <form action="register.php" method="post">
                <input class="btn btn-default" type="submit" value="Register">
            </form>
        </div>
    </div>  --> 
    <div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">

    <form class="form-signin" action="includes/login.php" method="post">
>
        <h1 class="form-signin-heading text-muted">Login</h1>
        <input type="text" class="form-control" name="Username" placeholder="Username">
        <input type="password" class="form-control" placeholder="Password" value="login">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
    </form>

</div>
<?php require_once 'includes/footer.php';?>
</body>
</html>
