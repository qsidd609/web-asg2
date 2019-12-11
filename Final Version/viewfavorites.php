<?php
session_start();



require_once 'favorites.php';
if (isset($_GET["fileName"])) {
    $fileName = $_GET["fileName"];
    addToFavorites($fileName);
    
}



?>
<!DOCTYPE html>
<html>

<head>
    <?php
    $title = "Travel Photos - View Favorites";
    ?>
    <link rel="stylesheet" href="css/viewfavorites.css" media="screen and (min-width: 600px)">
    <link rel="stylesheet" href="css/viewfavoritesMobile.css" media="screen and (max-width:600px)">
</head>

<body>
    <main class="container">
            <?php    
                echo "<header>";
                echo "<h3><img class='logo' src='logo.png'>COMP 3512</h3>";
                echo "<ul class='topnav'>";
                echo "<li><a href='index.php'>Home</a></li>
                <li><a href='About Page HTML.html'>About</a></li>
                <li><a href='browse.php'>Browse/Search</a></li>
                <li><a href='single-country.php'>Countries</a></li>
                
                
                <li><a class='active' href='viewfavorites.php'>Favorites</a></li>
                <li><a href='logout.php'>Logout</a></li>";
                echo "</ul>";
                echo "</header>";
                ?>
        <div class="content">
            <?php
            if (isset($_SESSION['email'])) {
                $favorites = getFavorites();
                if (count($favorites) > 0) {
                    ?> <ul class="ul-favorite"> <?php
                        foreach ($favorites as $f) {
                            echo "<a href='single-photo.php?fileName=" . $f->Path . "'>";
                            echo '<img class="displayPic" src="images/square150/' . $f->Path . '"></br>';
                            echo "</a>";
                            echo $f->Title . "</br>";
                            echo "<a class='button' href=delete.php?ImageID=".$f->ImageID.">Delete</a></br></br>";
                            }
                            ?>
                    </ul>
                    <!-- <p id="removeall"><button class="button"><span><a target="" href="services/removefavorites.php?remove=all">Remove All</a></span></button></p> -->
                    
                    
                <?php
                    }
                } else {

                    ?>
                <div class="nofavorites">
                    <p>No favorites found.</p>
                </div>
            <?php
            }

            
            ?>

            <?php 
            
            echo "<a href=deleteAll.php>Delete All</a>";

            ?>

            <div>
                
            </div>
        </div>
    </main>


</body>
<script type="text/javascript" src="main.js"></script>

</html>


                   