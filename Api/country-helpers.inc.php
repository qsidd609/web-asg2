<?php

function getCountrySQL() {
    try{
        $connection = setConnectionInfo(DBCONNSTRING, DBUSER, DBPASS);
       $sql = 'SELECT * FROM countries';
       $sql .= " ORDER BY CountryName";
        $result = runQuery($connection, $sql, null);
       return $sql;
    }
    catch (PDOException $e){
        die ($e->getMessage());
    }
} 

function getAllCountries($connection) {
    try {
      $sql= getCountrySQL();
      $results = runQuery($connection, $sql, null);
        $results -> execute();
        $result2 = $results -> fetchAll(PDO::FETCH_ASSOC);    
      echo json_encode($result2,JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT);
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}

function getCitySQL() {
    try{
        $connection = setConnectionInfo(DBCONNSTRING, DBUSER, DBPASS);
       $sql = 'SELECT * FROM cities';
       $sql .= " ORDER BY AsciiName";
        $result = runQuery($connection, $sql, null);
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
      
    }
    catch (PDOException $e){
        die ( $e->getMessage() );
    } 
}


?>