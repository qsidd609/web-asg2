<?php
  function getSinglePhoto($fileName, $connection){
   try {
   $sql = 'select * from imagedetails where path=?';
   $statement = runQuery($connection,$sql,array($fileName));
   $row = $statement->fetch(PDO::FETCH_ASSOC);
   $connection = null;
   
   return $row;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }

  function getCityName($iso, $connection){
   try {
   $sql = 'select AsciiName from cities where CityCode=?';
   $statement = runQuery($connection,$sql,$iso);
   $row = $statement->fetch(PDO::FETCH_ASSOC);
   $connection = null;
   
   return $row;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }

  function getUserName($iso, $connection){
   try {
   $sql = 'select FirstName, LastName from users where UserId=?';
   $statement = runQuery($connection,$sql,$iso);
   $row = $statement->fetch(PDO::FETCH_ASSOC);
   $connection = null;
   
   return $row;
   }
   catch (PDOException $e) {
       die( $e->getMessage() );
     } 
  }
    
 ?>