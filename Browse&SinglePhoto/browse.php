<?php 

    require_once 'browse-helper.inc.php';
    require_once 'db-functions.inc.php';
    require_once 'config.inc.php';
    $connection = setConnectionInfo(DBCONNSTRING,DBUSER,DBPASS); 

?> 

<html>
    <head>
        <!--   <meta charset="utf-8"/> -->
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Browse</title> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/browse.css?<?php echo time(); ?>">
    </head>
<body>

<main class="container">
    <article class="header">HEADER</article> 
    
    <article class="leftside">
        <h2>Browse By:</h2>
        <form class="countryForm" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
        <div class="field">
            <select class="countryField" name="ISO">
                <option>Country</option>  
                <?php  
                    getAllCountries($connection);
                ?>
            </select>

          </div> 
            <br>
            <button id="filterButton" type="submit">
              <i class="filter icon"></i> Filter 
            </button>
        </form> 
        <form class="cityForm" method="get" action="<?=$_SERVER['REQUEST_URI']?>">
        <div class="field">

            <select class="cityField" name="cityCode">
                <option>City</option>  
                <?php  
                    getAllCities($connection);
                ?>
            </select>
          </div> 
            <br>
            <button id="filterButton" type="submit">
              <i class="filter icon"></i> Filter 
            </button> 
            
        </form>
        <br>
        <?php
                $url=strtok($_SERVER["REQUEST_URI"],'?');
                echo '<form class="resetForm" action="'.$url.'">';
                echo '<button id="resetButton"type="submit">Reset</button>';
                echo '</form>';

            ?>
        

    </article>
    <article class="rightside">
        <h2>Pictures</h2>
        <ul id="pictureList">
            
            <?php  
               // output all the retrieved paintings
                if (isset($_GET["ISO"])) {
                    $ISO = $_GET["ISO"];
                    getPicturesByCountry($connection, $ISO);
                }
                else if (isset($_GET["cityCode"])) {
                    $cityCode = $_GET["cityCode"];
                    getPicturesByCity($connection, $cityCode);
                }
                else {
//                    $countryISO = 'CA';
//                    getPicturesByCountry($connection, $countryISO);
                    getAllPictures($connection);
                }
            
            ?>
        
        </ul>
    </article>
</main>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE"
    async defer></script>
</body>
</html>