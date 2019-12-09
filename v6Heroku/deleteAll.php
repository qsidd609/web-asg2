<?php 

$conn = mysqli_connect("localhost", "root", "", "travel");

$sql = "DELETE FROM favorites";
$result = mysqli_query($conn, $sql);

if(mysqli_query($conn, $sql)){
    header("refresh:1; url=viewfavorites.php");
}
else{
    echo "Not deleted";
}

?>