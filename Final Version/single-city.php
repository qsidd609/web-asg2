<?php
    require_once 'single-country-helper.inc.php';
    require_once 'db-functions.inc.php';
    require_once 'config.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);

    if(isset($_GET["cityCode"]))
    {
        $cityCode = $_GET["cityCode"];
        $city = getCity($connection, $cityCode);
        $country = getSingleCountry($city["CountryCodeISO"], $connection);
    }

    function fillImages($connection, $city) {
        $imagesForCity = getImagesForCity($connection, $city["CityCode"]);
        if(count($imagesForCity) > 0) {
            foreach($imagesForCity as $i) {
                echo "<a href='single-photo.php?fileName=" . $i["Path"] . "' >";
                echo "<img src='images/square150/" . $i["Path"] . "' />";
                echo "</a>";
            }}
        else {
            echo "No Photos Found";
        }}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COMP 3512 Assign2</title>
        <link rel="stylesheet" href="css/singleCountryStylesheetDesktop.css" media="screen and (min-width: 600px)">
        <link rel="stylesheet" href="css/singleCountryStylesheetMobile.css" media="screen and (max-width:600px)"> 
        <script src="JS/singleCountryJS.js"></script>
    </head>
        <body id="singleCountryBody">
        <header id="singleCountryHeader">
        <img class='logo' src='logo.png'>
        <br id='br'>
        <br id='br'>
        <h3 id='title'>COMP 3512</h3>


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
            <li><a href="browse.php">Browse/Search</a></li>
            <li><a class="active"href="single-country.php">Countries</a></li>
            
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>'; 
        }
        elseif (isset($_SESSION['email'])) {
            echo '<ul class="topnav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="browse.php">Browse/Search</a></li>
            <li><a class="active"href="single-country.php">Countries</a></li>
            <li><a href="viewfavorites.php">Favorites</a></li>
            <li><a href="logout.php">Logout</a></li>"
            
        </ul>';
        }



        ?>  


        </header>
        <section id="singleCountryGrid1">
            <div id="singleCountryCountryFilters" class="grid1">
                <h3>Country Filters</h3>
                    <div id="singleCountryFiltersForCountries" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
                                                <form class="singleCountrySearchForCountry" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
                            <div class="field">
                                <input type="text" placeholder="Search.." name="search">
                                <button id="filterButton" type="submit">Search</button>
                            </div>
                         </form>
                        <br>
                        <form id="singleCountrySearchByCon">
                            <select id="singleCountryConList" name="cont">
                                <option value="test">Continent</option>
                                <option value="AF">Africa</option>
                                <option value="AN">Antarctica</option>
                                <option value="AS">Asia</option>
                                <option value="EU">Europe</option>
                                <option value="OC">Oceania</option>
                                <option value="NA">North America</option>
                                <option value="SA">South America</option>
                            </select>
                            <button id="filterButton" type="submit">Search</button>
                        </form>
                        <br>
                        <?php

                            $url=strtok($_SERVER["REQUEST_URI"],'?');
                            echo '<form class="resetForm" action="'.$url.'">';
                            echo '<button id="singleCountryResetCountryFilters" name="withImages" value="1" type="submit">Countries with Images</button>';
                            echo '</form>';
                            
                            echo '<form class="resetForm" action="single-country.php?">';
                            echo '<button id="resetFilter" type="submit">Reset Filters</button>';
                            echo '</form>';
                        ?>
                    </div>

            </div>
            <div id="singleCountryCountryList" class="grid1">
                <h3>Country List</h3>
                <ul id="singleCountryCountries">
                    <?php
                        if (isset($_GET["withImages"])) {
                            getPhotoCountries($connection);
                        }
                        else if (isset($_GET["search"])){
                            $search = $_GET["search"];
                            getSearchCountries($connection, $search); 
                        }
                        else if (isset($_GET["cont"])){
                            $continent = $_GET["cont"];
                            getContCountries($connection, $continent);
                        }
                        else{
                            getCountries($connection);   
                        }
                    ?>
                
                </ul>
                
            </div>
        </section>
        <section id="singleCountryGrid2">
            <div id="singleCountryCityMap" class="singleCountryGrid2">
                <div id="singleCountryCityMap">
                    <h3>City Map</h3>
                    <?php echo '<img id="map" src = "https://maps.googleapis.com/maps/api/staticmap?center='.$city['AsciiName'].','.$city['CountryCodeISO'].'&zoom=9&scale=1&size=500x500&markers=color:blue%7Clabel:S%7C'.$city['Latitude'].', '.$city['Longitude'].'&maptype=roadmap&key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE&format=png&visual_refresh=true"/>';
                ?>
                </div>
                </div>
                    <div id="singleCountryCountryCityDetails">
            <div id="singleCountryCityDetails">
                <h3>City Details</h3>
                <h4 id="singleCityCityTitle">
                    <span><?php if(isset($_GET["cityCode"])){echo $city["AsciiName"] . ", " . $country["CountryName"];}?></span></h4> 
                <p id="singleCityPopulation">Population:
                    <span><?php if(isset($_GET["cityCode"])){echo $city["Population"];}?></span></p>
                <p id="singleCityCurrency">Currency:<span>
                    <?php if(isset($_GET["cityCode"])){echo $country['CurrencyName'];} ?></span></p>
                <p id="singleCityDomain">Domain:
                    <span><?php if(isset($_GET["cityCode"])){echo $country['TopLevelDomain'];} ?></span></p>
                <p id="singleCityLanguages">Languages:
                    <span><?php if(isset($_GET["cityCode"])){getLanguages($connection, $country);} ?></span></p>
                <p id="singleCityCapitalCity">Capital of <?php if(isset($_GET["cityCode"])){echo $country["CountryName"];}?>: 
                    <span><?php if(isset($_GET["cityCode"])){echo $country["Capital"];} ?></span></p>
                <p id="singleCityCountryArea">Area of <?php if(isset($_GET["cityCode"])){echo $country["CountryName"];}?>:
                    <span><?php if(isset($_GET["cityCode"])){echo $country['Area']; echo "m<sup>2</sup>";} ?></span></p>
                <p id="singleCitynCountries"><?php if(isset($_GET["cityCode"])){ nCountries($connection, $country);} ?></p>
                <p id="singleCityDescription"><?php if(isset($_GET["cityCode"])){
                    if($country["CountryDescription"] !== null){echo $country["CountryDescription"];}} ?></p>
            </div>
            </div>
        </section>
        <div id="singleCountryCityPhotos" class="imgCursor">
            <h3>City Photos</h3>
            <div id="singleCountryCityPhotosLocation">
                <?php fillImages($connection, $city); ?>
            </div>
        </div>
    </body>
</html>