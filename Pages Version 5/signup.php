<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <br />
        <h3>COMP 3512 Assignment 2 Title Page</h3>
        <br />
        <ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Browse/Search</a></li>
            <li><a href="">Countries</a></li>
            <li><a href="">Cities</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a class='active' href="">Sign Up</a></li>
        </ul>
    </header>
    <main>
        <div class="header">
            <h2>Register</h2>
        </div>
        <form action="signup.php" method="post">
            <?php include('errors.php') ?>
            <div class="input-group">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo $firstName; ?>">
            </div>

            <div class="input-group">
                <label>Last Name:</label>
                <input type="text" name="surname" value="<?php echo $surName; ?>">
            </div>

            <div class="input-group">
                <label>City:</label>
                <input type="text" name="city" value="<?php echo $city; ?>">
            </div>

            <div class="input-group">
                <label>Country:</label>
                <input type="text" name="country" value="<?php echo $country; ?>">
            </div>

            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="password" value="" pattern=".{8,}" title="8 or more characters">
            </div>

            <div class="input-group">
                <label>Confirm Password:</label>
                <input type="password" name="password2" value="" pattern=".{8,}">
            </div>

            <div class="input-group">
                <button type="submit" class="btn" name="submit">Submit</button>
            </div>

            <div>
                <p>Already a member? <a href="login.php">Sign in</a></p>
            </div>
        </form>

    </main>
</body>

</html>