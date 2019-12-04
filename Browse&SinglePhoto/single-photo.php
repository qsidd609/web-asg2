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
        //$fileName = "48844900556.jpg"; 
    }
    $SinglePhoto = getSinglePhoto($fileName, $connection);

    $cityCode = $SinglePhoto['CityCode'];
    $cityName = getCityName($cityCode, $connection);
    $userID = $SinglePhoto['UserID'];
    $userName = getUserName($userID, $connection);
    $exif = preg_replace("/[^:a-zA-Z0-9\s]/", "",$SinglePhoto['Exif']);
//    $exif = str_replace(' ',"<br>",$exif);
    $exifArray = explode(',', $exif);
?>

<html>
    <head>
        <!--   <meta charset="utf-8"/> -->
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single-Photo</title> 
        <link rel="stylesheet" href="css/single-photo.css?<?php echo time(); ?>">
    </head>
<body>

<main class="container">
    <article class="header">HEADER</article>
    <article class="leftside">
        <br>
        <img class="mainPhoto"<?php echo 'src="https://storage.googleapis.com/assignment1_web2/medium800/'.$fileName.'"';  ?> alt="picture name">
    </article>
    <article class="rightside">
        <form action ="favorites.php?fileName=<?php echo $fileName; ?>" method ="post">
            <button id="favoriteButton" value="txt">Add to Favorites</button>
        </form>
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
                <?php echo $exif; ?>
<!--
                <label>Make:</label>
                <span id="picMake"></span> 

                <label>Model:</label>
                <span id="picModel"></span> 

                <label>Exposure Time:</label>
                <span id="exposureTime"></span> 

                <label>Aperture:</label>
                <span id="aperture"></span> 

                <label>focal Length:</label>
                <span id="focalLength"></span> 

                <label>iso:</label>
                <span id="iso"></span>    
-->
            </section>
            <section id="mapData"> 
                <h2>Map</h2>
                <?php echo '<img src = "https://maps.googleapis.com/maps/api/staticmap?center='.$cityName['AsciiName'].','.$SinglePhoto['CountryCodeISO'].'&zoom=9&scale=1&size=500x250&markers=color:blue%7Clabel:S%7C'.$SinglePhoto['Latitude'].', '.$SinglePhoto['Longitude'].'&maptype=roadmap&key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE&format=png&visual_refresh=true"/>';
                ?>
            </section>
        </div>
    </article> 


<!--    hover box details-->
<!--
        <section id="hoverBox">
          <h2>Credit Details</h2> 

          <label>Actual:</label>
          <span id="actual"></span> 

          <label>Creator:</label>
          <span id="creator"></span> 

          <label>Source:</label>
          <span id="source"></span> 


          <h2>Picture Details</h2> 

          <label>Make:</label>
          <span id="hoverMake"></span> 

          <label>Model:</label>
          <span id="hoverModel"></span> 

          <label>Exposure Time:</label>
          <span id="hoverExpTime"></span> 

          <label>Aperture:</label>
          <span id="hoverAperture"></span> 

          <label>focal Length:</label>
          <span id="hoverFocalLength"></span> 

          <label>iso:</label>
          <span id="hoverIso"></span> 


          <h2>Colors Details</h2> 

        </section>
-->

    
</main>
<script src="js/single-photo.js"></script>
</body>
</html>