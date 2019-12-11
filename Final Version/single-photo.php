<?php 
    require_once 'single-photo-helper.inc.php';
    require_once 'db-functions.inc.php';
    require_once 'config.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);

    if (isset($_GET["fileName"])){
        
        $fileName = $_GET["fileName"]; 
    }
    else{
        $fileName = "8646991554.jpg";
    }

    

    $SinglePhoto = getSinglePhoto($fileName, $connection);
    $cityCode = $SinglePhoto['CityCode'];
    $cityName = getCityName($cityCode, $connection);
    $userID = $SinglePhoto['UserID'];
    $userName = getUserName($userID, $connection);
    $exif = preg_replace("/[^,:a-zA-Z0-9\s]/", "",$SinglePhoto['Exif']);
    $exifArray = explode(',', $exif);
    $exifHover = str_replace(',',"<br>",$exif);
    $colors = $SinglePhoto['Colors'];
    $colors = preg_replace("/[^#,:a-zA-Z0-9\s]/", "",$colors);
    $colors_arr = explode(',', $colors);
    $imageID = $SinglePhoto['ImageID'];
?>
<html>
    <head>
        <!--   <meta charset="utf-8"/> -->
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single-Photo</title> 
        <link rel="stylesheet" href="css/single-photo.css?<?php echo time(); ?>" media="screen and (min-width: 600px)">
        <link rel="stylesheet" href="css/single-photoMobile.css" media="screen and (max-width:600px)"> 
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
            <li><a href="">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>'; 
        }
        elseif (isset($_SESSION['email'])) {
            echo '<ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="">Browse/Search</a></li>
            <li><a href="single-country.php">Countries</a></li>
            <li><a href="viewfavorites.php">Favorites</a></li>
            <li><a href="logout.php">Logout</a></li>"
            
        </ul>';
        }



        ?>
    </article>
    <article class="leftside">
        <br>
        <picture class="mainPhoto'>
            <source media="(min-width: 600px)" class='mainPhoto' <?php echo 'srcset="images/medium800/'.$fileName.'"';  ?>>
            <source media="(max-width: 600px)" class='mainPhoto' <?php echo 'srcset="images/square150/'.$fileName.'"';  ?>>
            <img class='mainPhoto' <?php echo 'src="images/medium800/'.$fileName.'"';  ?> alt="picture name">
        </picture>
        
        <!--    hover box details-->
        <section id="hoverBox">
          <h2>Credit Details</h2> 
          <span id="actual"><?php echo $SinglePhoto['ActualCreator']; ?></span> 
            <br>
          <label>Creator:</label>
          <span id="creator"><?php echo $SinglePhoto['CreatorURL']; ?></span> 
            <br>
          <label>Source:</label>
          <span id="source"><?php echo $SinglePhoto['CreatorURL']; ?></span> 
            <br>
          <h2>Picture Details</h2> 
            <?php 
                echo $exifHover; 
            ?>
          <h2>Colors Details</h2> 
            <?php 
                foreach($colors_arr as $key => $value){
                    echo "$key : $value<br/>";
                }
             ?>
        </section>
    </article>
    <article class="rightside">
        <?php
            
            if (isset($_SESSION['email'])) {
                echo '<form action ="viewfavorites.php?fileName='.$fileName.'&id='.$imageID.'" method ="post">';
                echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            }
            else{
                echo '<form action ="index.php" method ="post">';
                echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            }
            
            //<button id="favoriteButton" value="txt">Add to Favorites</button>
            echo '</form>';
        ?>
        <section >
            <h2 id="pictureName"><?php echo $SinglePhoto['Title']; ?></h2> 
            <h4 id="userName"><?php echo $userName['FirstName'].' '.$userName['LastName']; ?></h4>
            <h4 id="picLocation"><?php echo $cityName['AsciiName'].', '.$SinglePhoto['CountryCodeISO']; ?></h4> 
        </section>
        <section>
            <button class="descriptionTab" >Description</button>
            <button class="detailTab"  >Details</button>
            <button class="mapTab"  >Map</button>
        </section>
        <div id="detailsDiv">
            <section id="descriptionData">
                <h2>Description</h2>
                <div><?php echo $SinglePhoto['Description']; ?></div>
            </section>
            <section id="detailData">
                <h2>Details</h2>
                <?php echo $exif;?>
            </section>
            <section id="mapData"> 
                <h2>Map</h2>
                <?php echo '<img id="map" src = "https://maps.googleapis.com/maps/api/staticmap?center='.$cityName['AsciiName'].','.$SinglePhoto['CountryCodeISO'].'&zoom=9&scale=1&size=500x250&markers=color:blue%7Clabel:S%7C'.$SinglePhoto['Latitude'].', '.$SinglePhoto['Longitude'].'&maptype=roadmap&key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE&format=png&visual_refresh=true"/>';
                ?>
            </section>
        </div>
    </article> 
</main>
<script src="js/single-photo.js?<?php echo time(); ?>"></script>
</body>
</html>