<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/index_css.css">
</head>

</html>
<?php

session_start();

//logout, end session
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
}
//not in session, so log in
if (!isset($_SESSION['email'])) {


    echo "<header>";
    echo "<h3>COMP 3512 Assignment 2 Title Page</h3>";
    echo "<ul class='topnav'>";
    echo "<li><a class='active' href=''>Home</a></li>
    <li><a href=''>About</a></li>
    <li><a href=''>Browse/Search</a></li>
    <li><a href=''>Countries</a></li>
    <li><a href=''>Cities</a></li>
    
    
    
    <li><a href='login.php'>Login</a></li>
    <li><a href='signup.php'>Sign Up</a></li>";
    echo "</ul>";
    echo "</header>";

    echo "
    <main id='mainNotLogged'>
        <div id='notLoggedIn'>
            <a href='login.php'><button id='login'>Login</button></a>
            <a href='signup.php'><button id='join'>Join</button><br></a>
            <br>
            <div id='search2'>
                <input type='text' class='search2' placeholder='SEARCH BOX FOR PHOTOS'>
            </div> <br>
        </div>
    ";
    echo "</main>";
}

//in session, so you're logged in
if (isset($_SESSION['email'])) {
    //establish connection and select user details from sql
    $conn = mysqli_connect("localhost", "root", "", "travel");
    $sql = "select FirstName, LastName, City, Country from users where Email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    echo "
    <head>
    <meta charset='utf-8' />
    <title>Home</title>
    <link rel='stylesheet' href='css/index_css.css'>
    </head>
    ";

    //header
    echo "<body>";
    echo "<header>";
    echo "<h3>COMP 3512 Assignment 2 Title Page</h3>";
    echo "<ul class='topnav'>";
    echo "<li><a class='active' href=''>Home</a></li>
    <li><a href=''>About</a></li>
    <li><a href=''>Browse/Search</a></li>
    <li><a href=''>Countries</a></li>
    <li><a href=''>Cities</a></li>
    <li><a href=''>Upload</a></li>
    <li><a href=''>Profile</a></li>
    <li><a href=''>Favorites</a></li>
    <li><a href='logout.php'>Logout</a></li>";
    echo "</ul>";
    echo "</header>";

    //main
    echo "<main>";
    echo "
    <div id='loggedIn'>
    
            <div id='userInfo'>User info:<br/><br/>";

    echo "First name: " . $row['FirstName'] . "<br/>";
    echo "Last name: " . $row['LastName'] . "<br/>";
    echo "City: " . $row['City'] . "<br/>";
    echo "Country: " . $row['Country'];

    echo "              
            </div>

            <div id='search'><input type='text' class='search' placeholder='SEARCH BOX FOR PHOTOS'>
                
            </div>

            <div id='favorite'>Favorited Images
                
            </div>

            <div id='suggestion'>Images You May Like
                
            </div>
        </div>
    ";
    echo "</main>";
    echo "</body>";
}
?>