<?php

function getCountrySQL() {
       $sql = 'SELECT ISO, ISONumeric, CountryName, Capital, CityCode, Area, Population, Continent, TopLevelDomain, CurrencyCode, CurrencyName, PhoneCountryCode, Languages, Neighbours, CountryDescription FROM countries';
       return $sql;
} 
function getAllCountries($connection) {
    try {
        $sql= getCountrySQL();
        $results = runQuery($connection, $sql, null);
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}

function getSingleCountries($connection, $iso) {
    try {
        $sql = getCountrySQL();
        $sqlFinal = $sql . " WHERE ISO=?";
        $results = runQuery($connection, $sqlFinal, array($iso));
        $results -> execute();
        $result2 = $results -> fetch(PDO::FETCH_ASSOC); 
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
    }
    catch (PDOException $e) {
        die ($e->getMessage());
    }
}

function getCountriesWithImages($connection) {
    try {
        $sqlFinal = "SELECT DISTINCT ISO, ISONumeric, CountryName, Capital, c.CityCode, Area, Population, Continent, TopLevelDomain, CurrencyCode, CurrencyName, PhoneCountryCode, Languages, Neighbours, CountryDescription FROM countries c, imagedetails i WHERE c.ISO = i.CountryCodeISO";
        $results = runQuery($connection, $sqlFinal, null);
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
    }
    catch (PDOException $e){
        die ( $e->getMessage());
    }
}

function getCitySQL() {
    try {
       $sql = 'SELECT CityCode, AsciiName, CountryCodeISO, Latitude, Longitude, Population, Elevation, TimeZone FROM cities';
       return $sql;
    }
    catch (PDOException $e){
        die ($e->getMessage());
    }
} 

function getAllCities($connection) {
    try {
        $sql= getCitySQL();
        $results = runQuery($connection, $sql, null);
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}

function getCitiesByCountry($connection, $iso) {
    try {
        $sql= getCitySQL();
        $sqlFinal = $sql . " WHERE CountryCodeISO=?";
        $results = runQuery($connection, $sqlFinal, array($iso));
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}

function getLanguages($connection) {
    try {
        $sql= "SELECT id, name, iso FROM languages";
        $results = runQuery($connection, $sql, null);
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
        echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
        $connection = null;
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}


?>