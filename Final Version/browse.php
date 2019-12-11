<?php 

    require_once 'browse-helper.inc.php';
    require_once 'db-functions.inc.php';
    require_once 'config.inc.php';
    require_once 'favorites.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS); 

?> 
<html>
    <head>
        <!--   <meta charset="utf-8"/> -->
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Browse</title> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/browse.css?<?php echo time(); ?>" media="screen and (min-width: 600px)">
        <link rel="stylesheet" href="css/browseMobile.css" media="screen and (max-width:600px)"> 
    </head>
<body>

<main class="container">
    <article class="header">
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
            <li><a href="about.php">About</a></li>
            <li><a class="active"href="">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>'; 
        }
        elseif (isset($_SESSION['email'])) {
            echo '<ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a class="active"href="">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            <li><a href="viewfavorites.php">Favorites</a></li>
            <li><a href="logout.php">Logout</a></li>"
            
        </ul>';
        }



        ?>


    </article> 
    <article class="leftside">
        <h2>Filters:</h2>
        <form class="countryForm" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="field">
                <select class="countryField" name="ISO">
                    <option>Country</option>  
                    <?php  
                        getAllCountries($connection);
                    ?>
                </select>
                <button id="filterButton" type="submit">
                  <i class="filter icon"></i> Filter 
                </button>
            </div> 
        </form> 
        <form class="cityForm" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="field">
                <select class="cityField" name="cityCode">
                    <option>City</option>  
                    <?php  
                        getAllCities($connection);
                    ?>
                </select> 
                <button id="filterButton" type="submit">
                  <i class="filter icon"></i> Filter 
                </button> 
            </div>
        </form>
        <form class="cityForm" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="field">
              <input type="text" placeholder="Search.." name="search">
              <button id="filterButton" type="submit">Search</button>
            </div>
        </form>
        <br>
        <?php
            $url=strtok($_SERVER["REQUEST_URI"],'?');
            echo '<form class="resetForm" action="'.$url.'">';
            echo '<button id="resetButton"type="submit">Reset</button>';
            echo '</form>';
        ?>
    </article>
    <article class="rightside">
        <h2>Pictures</h2>
        <ul id="pictureList">
            <?php  
               // output all the retrieved paintings
                if (isset($_GET["ISO"])) {
                    $ISO = $_GET["ISO"];
                    getPicturesByCountry($connection, $ISO);
                }
                else if (isset($_GET["cityCode"])) {
                    $cityCode = $_GET["cityCode"];
                    getPicturesByCity($connection, $cityCode);
                }
                else if (isset($_GET["search"])) {
                    $search = $_GET["search"];
                    getPicturesBySearch($connection, $search);
                }
                else {
                    getAllPictures($connection);
                }
            ?>
        </ul>
    </article>
</main>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE"
    async defer></script>
</body>
</html>