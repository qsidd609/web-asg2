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
    <link rel="stylesheet" href="viewfavorites.css" />
</head>

<body>
    <?php    echo "<header>";
    echo "<h3>COMP 3512 Assignment 2 Title Page</h3>";
    echo "<ul class='topnav'>";
    echo "<li><a href='index.php'>Home</a></li>
    <li><a href=''>About</a></li>
    <li><a href='browse.php'>Browse/Search</a></li>
    <li><a href='single-country.php'>Countries</a></li>
    <li><a href='single-city.php'>Cities</a></li>
    
    
    <li><a class='active' href='viewfavorites.php'>Favorites</a></li>
    <li><a href='logout.php'>Logout</a></li>";
    echo "</ul>";
    echo "</header>";
    ?>
    <main class="container">
        <h1 class="favheader">Favorites</h1>

        <div class="content">
            <?php
            if (isset($_SESSION['email'])) {
                $favorites = getFavorites();
                if (count($favorites) > 0) {
                    ?> <ul class="ul-favorite"> <?php
                        foreach ($favorites as $f) {
                            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/' . $f->Path . '">';
                            echo "<a href=delete.php?ImageID=".$f->ImageID.">Delete</a>";
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


                   