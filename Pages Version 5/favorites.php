<?php
//include "viewfavorites.php";
    function addToFavorites($fileName){
    //Checks if the id exists
        //Checks if the session favorites exists
        if (isset($_SESSION['favorites'])) {
            $favorites = $_SESSION['favorites'];  
            
        } else {
            $favorites = array(); 
            $_SESSION['favorites'] = $favorites;            
            //echo "AddFavorites";
        }
        
    
        // add item to favourites
        $item = $fileName;
        $match = false;
        
        //Loop below checks for duplicates
        $i = 0;
        while ( $i < count($favorites)) {
            if($favorites[$i] == $item) {
                $favorites[$i] = $item;
                $match = true;
            }
            $i++;
        }
        
        //if match equals false, that means its not in the favorites list of the user
        //so it is added to the user's favorites array
        if ($match == false) { $favorites[] = $item; }
        $_SESSION['favorites'] = $favorites;
        
       //$favorites[] = $item;
       $_SESSION['favorites'] = $favorites;
        
        
        /*foreach($favorites as $f) {
            echo $f . " ";}*/
        
    } 
    //redirects to the php page that called this addtofavorites php script
 //   header("Location: {$_SERVER['HTTP_REFERER']}");
?>