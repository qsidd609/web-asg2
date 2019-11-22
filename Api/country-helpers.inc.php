<?php

function getCountrySQL() {
       $sql = 'SELECT ISO, ISONumeric, CountryName, Capital, CityCode, Area, Population, Continent, TopLevelDomain, CurrencyCode, CurrencyName, PhoneCountryCode, Languages, Neighbours, CountryDescription FROM countries';
       return $sql;
} 

function
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
        $sqlFinal = $sql . "WHERE ISO=? ";
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

function getCitySQL() {
       $sql = 'SELECT CityCode, AsciiName, CountryCodeIso, Latitude, Longitude, Population, Elevation, TimeZone FROM cities';
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
        $sqlFinal = $sql . "WHERE CountryCodeIso=? ORDER BY AsciiName";
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


?>