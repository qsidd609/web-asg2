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

echo "not logged in";
//    echo "<header>";
//    echo "<h3>COMP 3512 Assignment 2 Title Page</h3>";
//    echo "<ul class='topnav'>";
//    echo "<li><a class='active' href=''>Home</a></li>
//    <li><a href=''>About</a></li>
//    <li><a href='browse.php'>Browse/Search</a></li>
//    <li><a href='single-country.php'>Countries</a></li>
//    <li><a href='single-city.php'>Cities</a></li>
//    
//    
//    
//    <li><a href='login.php'>Login</a></li>
//    <li><a href='signup.php'>Sign Up</a></li>";
//    echo "</ul>";
//    echo "</header>";
//
//    echo "
//    <main id='mainNotLogged'>
//        <div id='notLoggedIn'>
//            <a href='login.php'><button id='login'>Login</button></a>
//            <a href='signup.php'><button id='join'>Join</button><br></a>
//            <br>
//            <div id='search2'>
//            <form class='cityForm' method='get' action='browse.php?=search'>
//            <div class='field'>
//            <input type='text' class='search2' placeholder='Search Box For Photos' name='search'>
//            <button id='filterButton' type='submit'>Search</button>
//            </div>
//            </form>
//            </div> <br>
//        </div>
//    ";
//    echo "</main>";
}

//in session, so you're logged in
if (isset($_SESSION['email'])) {
    echo "logged in";
//    //establish connection and select user details from sql
//    $conn = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);
//    $sql = "select FirstName, LastName, City, Country from users where Email = '" . $_SESSION['email'] . "'";
//    $result = runQuery($conn, $sql, null);
////    $row = mysqli_fetch_array($result);
//    
//
//
//
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
    echo "</body>";
//    
//    //main
//    echo "<main>";
//    echo "
//    <div id='loggedIn'>
//    
//            <div id='userInfo'>User info:<br/><br/>";
//    while ($row = $result->fetch()) {
//    echo "First name: " . $row['FirstName'] . "<br/>";
//    echo "Last name: " . $row['LastName'] . "<br/>";
//    echo "City: " . $row['City'] . "<br/>";
//    echo "Country: " . $row['Country'];
//    }
//    echo "              
//            </div>
//            <form id='search' method='get' action='browse.php?=search'>
//            <div class='field'>
//            <input type='text' class='search' placeholder='Search Box For Photos' name='search'>
//            <button id='filterButton' type='submit'>Search</button>
//            </div>
//            </form>
//            
//
//            <div id='favorite'>Favorited Images:<br/>";
//
//    
//        
//        $favorites = getFavorites();
//        if (count($favorites) > 0) {
//            foreach ($favorites as $f) {
//                echo "<a href='single-photo.php?fileName=" . $f->Path . "'>";
//                echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/' . $f->Path . '">';
//                echo "</a>";
//            }
//        }
//    
//     if (count($favorites) == 0) {
//         echo "No favorited images";
//     }
//
//    echo "
//                
//            </div>
//
//            <div id='suggestion'>Images You May Like:<br/>";
//
//    $sql2 = "SELECT Path FROM imagedetails WHERE ImageID > 137";
//    $result2 = runQuery($conn, $sql2, null);
//    $row2 = mysqli_fetch_array($result2);
//
//    $favorites = getFavorites();
//    if (count($favorites) > 0) {
//        foreach ($favorites as $f) {
//            echo "<a href='single-photo.php?fileName=" . $f->Path . "'>";
//            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/' . $f->Path . '">';
//            echo "</a>";
//        }
//    } else {
//        while ($row2 = mysqli_fetch_array($result2)) {
//            echo "<a href='single-photo.php?fileName=" . $row2["Path"] . "'>";
//            echo "<img class='displayPic' src='https://storage.googleapis.com/assignment1_web2/square150/$row2[Path]'>";
//            echo "</a>";
//        }
//    }
//
//    echo "
//                
//            </div>
//        </div>
//    ";
//    echo "</main>";
//    echo "</body>";
//}
}
?>