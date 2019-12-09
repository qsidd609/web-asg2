<?php

    require_once 'single-country-helper.inc.php';
    require_once 'db-functions.inc.php';
    require_once 'config.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);

    if(isset($_GET["iso"])){
        $iso = $_GET["iso"];
        $country = getSingleCountry($iso, $connection);
    }

    function fillCityList($connection, $country) {
        $citiesArray = citiesByCountry($connection, $country["ISO"]);
        if(count($citiesArray) > 0) {
            foreach ($citiesArray as $c) {
            echo "<li><a href='single-city.php?cityCode=" . $c["CityCode"] . "'>" . $c["AsciiName"] . "</a></li>";
            }
        }
        else {
            echo "<li>No Cities Found</li>";
        }}

    function fillImages($connection, $country) {
        $imagesForCountry = photosForCountry($connection, $country["ISO"]);
        if(count($imagesForCountry) > 0) {
            foreach($imagesForCountry as $i) {
                echo "<a href='single-photo.php?fileName=" . $i["Path"] . "' >";
                echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/'.$i['Path'].'">';
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
        <header id="singleCountryHeader">COMP 3512 Assign2
        <subtitle id="singleCountrySubtitle"><br>Runveer, Ann, Mandeep, Alan</subtitle>          
        </header>
        <section id="singleCountryGrid1">
            <div id="singleCountryCountryFilters" class="grid1">
                <h3>Country Filters</h3>
                    <div id="singleCountryFiltersForCountries">
                        <div id="singleCountrySearchByCon">
                            <text>Select by Continent:</text>
                            <select id="singleCountryConList">
                                <option value="test">Continent</option>
                                <option value="AF">Africa</option>
                                <option value="AN">Antarctica</option>
                                <option value="AS">Asia</option>
                                <option value="EU">Europe</option>
                                <option value="OC">Oceania</option>
                                <option value="NA">North America</option>
                                <option value="SA">South America</option>
                            </select>
                        </div>
                        <br>
                        <div id="singleCountryCountriesWithImages">
                            <input type="radio" name="countryFilterButton" value="images" id="singleCountryCountryButton">Countries with Images
                        <br>
                        </div>
                        <br>
                        <form class="singleCountrySearchForCountry">
                            <fieldset>
                            <legend>Search for a Country</legend>
                            <input type="text" class="searchCountry" placeholder="Name of Country" list="filterList">
                            <datalist id="singleCountryFilterListCountry">
                            </datalist>
                            </fieldset>
                        </form>
                        <br>
                        <button id="singleCountryResetCountryFilters" value="resetCountryFilters">Reset Filters</button>
                    </div>
                <br>
                <button id="singleCountryHideCountryFilters" value="hideCountryFilters">Show/Hide</button>
                <br>
            </div>
            <div id="singleCountryCountryList" class="grid1">
                <h3>Country List</h3>
                <ul id="singleCountryCountries"></ul>
            </div>
        </section>
        <section id="singleCountryGrid2">
            <div id="singleCountryCityList" class="singleCountryGrid2">
                <div id="singleCountryCityListText">
                    <h3>City List</h3>
                    <ul id="singleCountryCities">
                        <?php if(isset($_GET["iso"])){fillCityList($connection, $country); }?></ul>
                </div>
                </div>
                    <div id="singleCountryCountryCityDetails">
            <div id="singleCountryCountryInformation">
                <h3>Country Details</h3>
                <h4 id="singleCountryCountryName">Country: 
                    <span><?php if(isset($_GET["iso"])){echo $country['CountryName'];} ?></span></h4> 
                <p id="singleCountryCountryArea">Area:
                    <span><?php if(isset($_GET["iso"])){echo $country['Area']; echo "m<sup>2</sup>";} ?></span></p>
                <p id="singleCountryCountryPopulation">Population:
                    <span><?php if(isset($_GET["iso"])){echo $country['Population'];} ?></span></p>
                <p id="singleCountryCapitalName">Capital:
                    <span><?php if(isset($_GET["iso"])){echo $country['Capital'];} ?></span></p>
                <p id="singleCountryCountryDomain">Domain:
                    <span><?php if(isset($_GET["iso"])){echo $country['TopLevelDomain'];} ?></span></p>
                <p id="singleCountryCountryCurrency">Currency:
                    <span><?php if(isset($_GET["iso"])){echo $country['CurrencyName'];} ?></span></p>
                <p id="singleCountryCountryLanguages">Languages: <span><?php if(isset($_GET["iso"])){getLanguages($connection, $country);} ?></span></p>
                <p id="singleCountrynCountries">
                    <?php if(isset($_GET["iso"])){ nCountries($connection, $country);} ?></p>
                <p id="singleCountryCountryDescription">
                    <?php if(isset($_GET["iso"])){
                    if($country["CountryDescription"] !== null){echo $country["CountryDescription"];}} ?></p>
            </div>
            </div>
        </section>
        <div id="singleCountryTravelPhotos" class="imgCursor">
            <h3>Country Photos</h3>
            <div id="singleCountryTravelPhotoLocation">
                <?php if(isset($_GET["iso"])) {fillImages($connection, $country);} ?>
            </div>
        </div>
    </body>
</html>
