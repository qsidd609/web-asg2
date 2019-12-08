<?php

function getSingleCountry($iso, $connection){
   try {
       $sql = 'SELECT ISO, ISONumeric, CountryName, Capital, CityCode, Area, Population, Continent, TopLevelDomain, CurrencyCode, CurrencyName, PhoneCountryCode, Languages, Neighbours, CountryDescription FROM countries WHERE ISO=?';
       $statement = runQuery($connection,$sql,array($iso));
       $row = $statement->fetch(PDO::FETCH_ASSOC);
       $connection = null;

       return $row;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }

function getLanguageArray($connection){
   try {
        $sql= "SELECT id, name, iso FROM languages";
        $results= runQuery($connection, $sql, null);
        $languagesArray = array();
        while ($row = $results->fetch()) {
            array_push($languagesArray, $row);   
        }
        $connection = null;
   
        return $languagesArray;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }

function getCountriesArray($connection){
   try {
        $sql="SELECT ISO, ISONumeric, CountryName, Capital, CityCode, Area, Population, Continent, TopLevelDomain, CurrencyCode, CurrencyName, PhoneCountryCode, Languages, Neighbours, CountryDescription FROM countries";
        $results= runQuery($connection, $sql, null);
        $countriesArray = array();
        while ($row = $results->fetch()) {
            array_push($countriesArray, $row);   
        }
        $connection = null;
   
        return $countriesArray;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }

function citiesByCountry($connection, $iso) {
     try {
         $sql = 'SELECT CityCode, AsciiName, CountryCodeISO, Latitude, Longitude, Population, Elevation, TimeZone FROM cities WHERE CountryCodeISO=? ORDER BY AsciiName';
         $results = runQuery($connection, $sql, array($iso));
         $citiesForCountries = array();
         while ($row = $results->fetch()) {
             array_push($citiesForCountries, $row);
         } 
         $connection = null;
        
         return $citiesForCountries;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

function photosForCountry($connection, $iso) {
    try {
         $sql = "SELECT ImageID, UserID, Title, CountryCodeISO, Path FROM imagedetails WHERE CountryCodeISO=?";
         $results = runQuery($connection, $sql, array($iso));
         $photosForCountry = array();
         while ($row = $results->fetch()) {
             array_push($photosForCountry, $row);
         } 
         $connection = null;
        
         return $photosForCountry;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

function getCity($connection, $cityCode) {
    try {
        $sql = "SELECT CityCode, AsciiName, CountryCodeISO, Latitude, Longitude, Population, Elevation, TimeZone FROM cities WHERE CityCode=?";
        $results = runQuery($connection, $sql, array($cityCode));
        $row = $results->fetch();
        $connection = null;
        return $row;
        
    }
    catch (PDOException $e){
        die ($e->getMessage() );
    }
}

function getLanguages($connection, $country){
    $languagesArray = getLanguageArray($connection);
    $languagesForCountry = $country["Languages"];
    $countryLanguages = explode(",", $languagesForCountry);
    $languagesCodes = array();
    foreach($countryLanguages as $l) {
        if(strpos($l, '-') !== false) {
            $proper = substr($l, 0, strpos($l, "-"));
            array_push($languagesCodes, $proper);
        }
        else {
            array_push($languagesCodes, $l);
        }

    }
    foreach($languagesCodes as $lc){
        foreach($languagesArray as $l) {
            if($lc == $l["iso"])
            {
                echo $l["name"] . " ";
            }}}}

function nCountries($connection, $country){
    $countriesArray = getCountriesArray($connection);
    $nCountries = $country["Neighbours"];
    if($nCountries !== null){
        echo "Neighbouring Countries: <span>";
        $nCountriesArray = explode(",", $nCountries);
        foreach($nCountriesArray as $nC) {
            foreach($countriesArray as $c) {
                if($nC == $c["ISO"]) {
                    echo $c["CountryName"] . " ";
                }}}
        echo "</span>";}}

function getImagesForCity($connection, $cityCode){
    try{
        $sql = "SELECT ImageID, UserID, Title, Description, Latitude, Longitude, CityCode, CountryCodeISO, ContinentCode, Path from imagedetails where CityCode=?";
        $results = runQuery($connection, $sql, array($cityCode));
        $photosForCity = array();
        while ($row = $results->fetch()) {
             array_push($photosForCity, $row);
         } 
         $connection = null;
        
         return $photosForCity;
    }
    catch(PDOException $e){
        die ($e->getMessage() );
    }
}
?>