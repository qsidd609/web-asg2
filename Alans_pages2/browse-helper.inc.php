<?php

function getAllCountries($connection){
   try {
   $sql = 'select distinct countries.CountryName, countries.ISO from countries INNER JOIN imagedetails ON countries.ISO = imagedetails.CountryCodeISO order by countries.CountryName';
   $statement = runQuery($connection,$sql, null);
    
    while ($gal = $statement->fetch()) {
        echo '<option value="' . $gal['ISO'].'">';
        echo $gal['CountryName'];
        echo "</option>";
    }
    $connection = null;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }


function getAllCities($connection){
   try {
   $sql = 'select distinct cities.AsciiName, cities.CityCode from cities INNER JOIN imagedetails ON cities.CityCode = imagedetails.CityCode order by AsciiName';
   $statement = runQuery($connection,$sql, null);
    
    while ($gal = $statement->fetch()) {
        echo '<option value="' . $gal['CityCode'].'">';
        echo $gal['AsciiName'];
        echo "</option>";
    }
    $connection = null;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
}

function getAllPictures($connection) {
     try {
         $sql = 'select Path, Title from imagedetails order by Title';
         $results = runQuery($connection, $sql, null);
         while ($paint = $results->fetch()) {
            echo '<li class="singlePicture">';
            echo '<div class="pictureDiv">'; 
            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/'.$paint['Path'].'">';
            echo '<p>'.$paint['Title'].'</p>'; 
            echo '</div>'; 
            echo '<div class="twoButtons">'; 
            echo '<form action ="single-photo.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="viewButton" value="txt">View</button>';
            echo '</form>';
             
            echo '<form action ="favorites.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            echo '</form>';
            echo '</div'; 
            echo '</li>';
         }
         $connection = null;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

function getPicturesByCountry($connection, $countryISO) {
     try {
         $sql = 'select * from imagedetails where CountryCodeISO=? order by Title';
         $results = runQuery($connection, $sql, $countryISO);
         while ($paint = $results->fetch()) {
            echo '<li class="singlePicture">';
            echo '<div class="pictureDiv">'; 
            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/'.$paint['Path'].'">';
            echo '<p>'.$paint['Title'].'</p>'; 
            echo '</div>'; 
            echo '<div class="twoButtons">'; 
            echo '<form action ="single-photo.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="viewButton" value="txt">View</button>';
            echo '</form>';
             
            echo '<form action ="favorites.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            echo '</form>'; 
            echo '</div'; 
            echo '</li>';
         }
         $connection = null;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

function getPicturesByCity($connection, $cityCode) {
     try {
         $sql = 'select Path, Title from imagedetails where CityCode=? order by Title';
         $results = runQuery($connection, $sql, $cityCode);
         while ($paint = $results->fetch()) {
            echo '<li class="singlePicture">';
            echo '<div class="pictureDiv">'; 
            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/'.$paint['Path'].'">';
            echo '<p>'.$paint['Title'].'</p>'; 
            echo '</div>'; 
            echo '<div class="twoButtons">'; 
            echo '<form action ="single-photo.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="viewButton" value="txt">View</button>';
            echo '</form>';
             
            echo '<form action ="favorites.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            echo '</form>';
            echo '</div'; 
            echo '</li>';
         }
         $connection = null;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

function getPicturesBySearch($connection, $search) {
     try {
//         $per = '%';
//         $search = $per.$search.$per;
         
         $sql = 'select Path, Title from imagedetails where Title like "%'.$search.'%" order by Title';
         $results = runQuery($connection, $sql, $search);
         while ($paint = $results->fetch()) {
            echo '<li class="singlePicture">';
            echo '<div class="pictureDiv">'; 
            echo '<img class="displayPic" src="https://storage.googleapis.com/assignment1_web2/square150/'.$paint['Path'].'">';
            echo '<p>'.$paint['Title'].'</p>'; 
            echo '</div>'; 
            echo '<div class="twoButtons">'; 
            echo '<form action ="single-photo.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="viewButton" value="txt">View</button>';
            echo '</form>';
             
            echo '<form action ="favorites.php?fileName='.$paint['Path'].'" method ="post">';
            echo '<button id="favoriteButton" value="txt">Add to Favorites</button></a>';
            echo '</form>';
            echo '</div'; 
            echo '</li>';
         }
         $connection = null;
     }
    catch (PDOException $e){
        die ( $e->getMessage() );
    }
}

?>