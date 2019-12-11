<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/signup_css.css" media="screen and (min-width: 600px)">
    <link rel="stylesheet" href="css/signupMobile_css.css" media="screen and (max-width:600px)"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <br />
        <h3><img class='logo' src='logo.png'>COMP 3512</h3>
        <br />
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="browse.php">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            <li><a class='active' href="">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </header>
    <main>
        <div class="header">
            <h2>Login</h2>
        </div>

        <form action="login.php" method="post">
            <?php include('errors.php') ?>

            <div class="input-group">
                <label>Email:</label>
                <input type="email" value="<?php echo $email; ?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" value="" pattern=".{8,}" title="8 or more characters">
            </div>

            <button type="submit" class="btn" name="login">Login</button>
            <div>
                <p>
                    Not yet a member? <a href="signup.php">Sign up</a>
                </p>
            </div>
        </form>
    </main>
</body>

</html>