<?php
//Creating a JSON of all the country info 
    require_once 'config.inc.php';
    require_once 'db-functions.inc.php'; 
    require_once 'country-helpers.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);
    header('Content-Type: application/json');
   
    getAllCities($connection);

    getCitiesByCountry($connection, $iso);

?>