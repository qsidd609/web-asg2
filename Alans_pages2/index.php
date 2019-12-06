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
    <li><a href='browse.php'>Browse/Search</a></li>
    <li><a href='single-country.php'>Countries</a></li>
    <li><a href='single-city.php'>Cities</a></li>
    
    
    
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
            <form class='cityForm' method='get' action='browse.php?=search'>
            <div class='field'>
            <input type='text' placeholder='Search Box For Photos' name='search'>
            <button id='filterButton' type='submit'>Search</button>
            </div>
            </form>
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

    $sql2 = "select Path from imagedetails where ImageID > 137";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2);

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
    <li><a href='browse.php'>Browse/Search</a></li>
    <li><a href='single-country.php'>Countries</a></li>
    <li><a href='single-city.php'>Cities</a></li>
    
    
    <li><a href='viewfavorites.php'>Favorites</a></li>
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
            <form class='cityForm' method='get' action='browse.php?=search'>
            <div class='field'>
            <input type='text' placeholder='Search Box For Photos' name='search'>
            <button id='filterButton' type='submit'>Search</button>
            </div>
            </form>
            </div>

            <div id='favorite'>Favorited Images";

    if ($_SESSION['favorites']) {
        echo "favorite images goes here";
    } else {
        echo "no images goes here";
    }

    echo "
                
            </div>

            <div id='suggestion'>Images You May Like";

            if($_SESSION['favorites']){
                echo "favorite images goes here";
            }
            else{
                while($row2 = mysqli_fetch_array($result2)){
                    echo "<a href='single-photo.php?fileName=" . $row2["Path"] . "'>";
                    echo "<img class='displayPic' src='https://storage.googleapis.com/assignment1_web2/square150/$row2[Path]'>";
                    echo "</a>";
                }
                
                
            }

    echo "
                
            </div>
        </div>
    ";
    echo "</main>";
    echo "</body>";
}
?>