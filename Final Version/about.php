<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/about.css">
    <title>COMP 3512 Assignment 2</title>
</head>

<body>
    <header>
        <h3><img class='logo' src='logo.png'>COMP 3512</h3>


        <?php 
        session_start();
        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['email']);
        }

        if(!isset($_SESSION['email'])){
           echo '<ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a class="active"href="">About</a></li>
            <li><a href="browse.php">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>'; 
        }
        elseif (isset($_SESSION['email'])) {
            echo '<ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a class="active"href="">About</a></li>
            <li><a href="browse.php">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            <li><a href="viewfavorites.php">Favorites</a></li>
            <li><a href="logout.php">Logout</a></li>"
            
        </ul>';
        }



        ?>

        
    </header>
    <main>
        <div id="Description">
            <h3>Website Description</h3>
            <p>This is a travel photo website in which users are able to browse travel photo images from across the world, and save to favourites the images that you like the most. It allows for users to create an account, and add the images they like the most to their own Favourites. Additionally, when the user browses countries, they are also able to view details regarding the country and city specified, including details, a map, and details about the respective travel photo displayed.</p>
        </div>

        <div id"classInfo">
            <h3>COMP 3512-001: Web II: Web Application and Development</h3>
            <h3>Dr. Randy Connolly</h3>
            <h3>Fall 2019 || Mount Royal University</h3>
            <h3>Technologies Used:</h3>
            <p><a href="https://infinityfree.net">InfinityFree for Hosting</a></p>
             <h3><a href="https://github.com/qsidd609/web-asg2.git">Repository</a></h3>
        </div>
        <div id="members">
            <h3>Members</h3>
            <dl id="membersList">
                <dt>Runveer Bhangoo</dt>
                    <dt> <a href="https://github.com/runveerb">https://github.com/runveerb</a></dt>
                <dt>Mandeep Gill</dt> 
                    <dt><a href="https://github.com/mg-singh">https://github.com/mg-singh</a></dt>
                <dt>Ann Siddiqui</dt>
                    <dt><a href="https://github.com/qsidd609">https://github.com/qsidd609</a></dt>
                <dt>Alan Wei</dt>
                    <dt><a href="https://github.com/awei863">https://github.com/awei863</a></dt>
            </dl>
        </div>
        <div id="sources">
            <h3>Sources:</h3>
            <p><a href="https://www.w3schools.com/css/css_navbar.asp">Navigation Bar</a></p>
            <p><a href="https://www.wdb24.com/how-to-use-php-password_hash-registration-login-form/">Password Hashing</a></p>
             <p> <a href="https://fonts.google.com/specimen/Libre+Franklin">Google Fonts</a></p>
        </div>
    </main>
</body>

</html>