<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/index.css" media="screen and (min-width: 600px)">
        <link rel="stylesheet" href="css/indexMobile.css" media="screen and (max-width:600px)"> 
</head>

</html>
<?php



session_start();

include 'favorites.php';
if (isset($_GET["fileName"])) {
    $fileName = $_GET["fileName"];
    addToFavorites($fileName);
}


//logout, end session
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
}
//not in session, so log in
if (!isset($_SESSION['email'])) {


    echo "<header>";
    echo "<h3><img class='logo' src='logo.png'>COMP 3512</h3>";
    echo "<ul class='topnav'>";
    echo "
    
    <li><a class='active' href=''>Home</a></li>
    <li><a href='about.php'>About</a></li>
    <li><a href='browse.php'>Browse/Search</a></li>
    <li><a href='single-country.php'>Countries</a></li>
    
    
    
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
            <input type='text' class='search2' placeholder='Search Box For Photos' name='search'>
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
    $conn = mysqli_connect("sql309.epizy.com", "epiz_24904799", "Wn70piLcid", "epiz_24904799_travel");
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
    echo "<h3 id='title'><img class='logo' src='logo.png'>COMP 3512</h3>";
    echo "<ul class='topnav'>";
    echo "<li><a class='active' href=''>Home</a></li>
    <li><a href='about.php'>About</a></li>
    <li><a href='browse.php'>Browse/Search</a></li>
    <li><a href='single-country.php'>Countries</a></li>
    
    
    <li><a href='viewfavorites.php'>Favorites</a></li>
    <li><a href='logout.php'>Logout</a></li>";
    echo "</ul>";
    echo "</header>";

    //main
    echo "<main>";
    echo "
    <div id='loggedIn'>
    
            <div id='userInfo'>User info:<br/><br/>";

    echo "<p>First name: <span>" . $row['FirstName'] . "</span></p><br/>";
    echo "<p>Last name: <span>" . $row['LastName'] . "</span></p><br/>";
    echo "<p>City: <span>" . $row['City'] . "</span></p><br/>";
    echo "<p>Country: <span>" . $row['Country'] . "<span></p>";

    echo "              
            </div>
            <form id='search' method='get' action='browse.php?=search'>
            <div class='field'>
            <input type='text' class='search' placeholder='Search Box For Photos' name='search'>
            <button id='filterButton' type='submit'>Search</button>
            </div>
            </form>
            

            <div id='favorite'>Favorited Images:<br/>";

    
        
        $favorites = getFavorites();
        if (count($favorites) > 0) {
            foreach ($favorites as $f) {
                echo "<a href='single-photo.php?fileName=" . $f->Path . "'>";
                echo '<img class="displayPic" src="images/square150/' . $f->Path . '">';
                echo "</a>&emsp;";
            }
        }
    
     if (count($favorites) == 0) {
         echo "No favorited images";
     }

    echo "
                
            </div>

            <div id='suggestion'>Images You May Like:<br/>";

    $sql2 = "SELECT Path FROM imagedetails WHERE ImageID > 137";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    $favorites = getFavorites();
    if (count($favorites) > 0) {
        foreach ($favorites as $f) {
            echo "<a href='single-photo.php?fileName=" . $f->Path . "'>";
            echo '<img class="displayPic" src="images/square150/' . $f->Path . '">';
            echo "</a>&emsp;";
        }
    } else {
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<a href='single-photo.php?fileName=" . $row2["Path"] . "'>";
            echo "<img class='displayPic' src='images/square150/$row2[Path]'>";
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