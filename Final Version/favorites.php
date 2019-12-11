<?php

$conn = mysqli_connect("sql309.epizy.com", "epiz_24904799", "Wn70piLcid", "epiz_24904799_travel");
function getFavorites(){
    global $conn;
    $email = $_SESSION['email'];
    $sql = "Select * from favorites, imagedetails where UserEmail='".mysqli_real_escape_string($conn, $email)."' and favorites.ImageID=imagedetails.ImageID";
    $arr = array();
    $result = mysqli_query($conn, $sql);
    while(($row= mysqli_fetch_object($result))!=null){
        array_push($arr, $row);
    }
    return $arr;
}
function addToFavorites($fileName)
{
    global $conn;
    $email = $_SESSION['email'];
    $imageId = $_GET["id"];
    
    $sql = "insert into favorites set UserEmail='".mysqli_real_escape_string($conn, $email)."', ImageID=".$imageId;
    $result = mysqli_query($conn, $sql);

   
    

//    
//    //Checks if the session favorites exists
//    if (isset($_SESSION['favorites'])) {
//        $favorites = $_SESSION['favorites'];
//
//        
//    } else {
//        $favorites = array();
//        $_SESSION['favorites'] = $favorites;
//
//       
//        
//    }
//
//
//    // add item to favourites
//    $item = $fileName;
//    $match = false;
//
//    //Loop below checks for duplicates
//    $i = 0;
//    while ($i < count($favorites)) {
//        if ($favorites[$i] == $item) {
//            $favorites[$i] = $item;
//            $match = true;
//        }
//        $i++;
//    }
//
//    //if match equals false, that means its not in the favorites list of the user
//    //so it is added to the user's favorites array
//    if ($match == false) {
//        $favorites[] = $item;
//        
//    }
//    $_SESSION['favorites'] = $favorites;
//    


    
} 
    //redirects to the php page that called this addtofavorites php script
 //   header("Location: {$_SERVER['HTTP_REFERER']}");
