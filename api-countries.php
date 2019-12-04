<?php
//Creating a JSON of all the country info 
    require_once 'config.inc.php';
    require_once 'db-functions.inc.php'; 
    require_once 'country-helpers.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS);
    header('Content-Type: application/json');
   
    
    if(isset($_GET["iso"]))
    {
        $iso = $_GET["iso"];
        if($iso == "all")
        {
            echo getAllCountries($connection);
        }
        else {
            echo getSingleCountries($connection, $iso); 
        }  
    }
    
    if(isset($_GET["image"]))
    {
        $image = $_GET["image"];
        if($image == "true")
        {
            echo getCountriesWithImages($connection);
        }
    }

    if(isset($_GET["languages"]))
    {
        $image = $_GET["languages"];
        if($image == "true")
        {
            echo getLanguages($connection);
        }
    }

?>