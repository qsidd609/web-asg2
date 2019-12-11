<?php 

$conn = mysqli_connect("sql309.epizy.com", "epiz_24904799", "Wn70piLcid", "epiz_24904799_travel");

$sql = "DELETE FROM favorites WHERE ImageID='$_GET[ImageID]'";
$result = mysqli_query($conn, $sql);

if(mysqli_query($conn, $sql)){
    header("refresh:1; url=viewfavorites.php");
}
else{
    echo "Not deleted";
}

?>