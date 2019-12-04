<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "Travel Photos - View Favorites";
            include "include/head.php";
        ?>
<!--        <link rel="stylesheet" href="css/viewfavorites.css"/> put CSS link here later -->
    </head>
    <?php include "include/navigation.php"; ?>
    <body>
        
        <main class="container">
            <h1 class="favheader">Favorites</h1>
            
            <div class="content">
                    <?php
                        if ($_SESSION['favorites']) {
                            $favorites = $_SESSION['favorites'];
                            if (count($favorites) > 0) {
                            ?> <ul class="ul-favorite"> <?php
                                foreach($favorites as $f) {
                                    require_once("services/database-functions.inc.php");
                                    $sql = "SELECT a.imageID, a.userID, p.title, p.description, p.cityCode
                                    FROM Travel as a INNER JOIN Photo as p ON a.imageID = p.userID
                                    WHERE p.imageID = ?";
                                    $parameter = array($f);
                                    $row = retrievedData($sql, $parameter);
                                    extract($row);
                                    
                                    // set names to empty string so that there is no null printed in html
                                    if ($FirstName == null) { $FirstName = ""; }
                                    if ($LastName == null) { $LastName == ""; }
                                    
                                    echo "<li class='favorite'>";
                                        echo "<img class=\"image\" src=\"../services/imagescale.php?size=full&width=100&type=travel&file=$ImageFileName\">";
                                        echo "<a class='afav' href=\"single-photo.php?id=$ImageID\">";
                                            echo "<span class=\"title\"> $Title $Description </span>";
                                        echo "</a>";
                                        
                                        echo "<a class='afav' href=\"single-photo.php?id=$ImageID\">";
                                            echo "<span class=\"photo\"> $Title </span>";
                                         echo "</a>";
                                        echo "<span class=\"description\"> $Description </span>";
                                        echo "<button class=\"button\"><span><a href=\"services/removefavorites.php?id=<?=$ImageID?>\"> Remove </a></span></button>";
                                    echo "</li>";
                                }
                            ?> 
                                </ul> 
                                <p id="removeall"><button class="button"><span><a target="" href="services/removefavorites.php?remove=all">Remove All</a></span></button></p>
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
            </div>
        </main>
        
        
    </body>
<!--    <script type="text/javascript" src="js/main.js"></script>--> Link JS here.
    
</html>