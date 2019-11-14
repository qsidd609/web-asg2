
<!DOCTYPE html>
<html>
    <head>
        <!--   <meta charset="utf-8"/> -->
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1</title>   

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">    
        <link rel="stylesheet" href="assign1.css">

    </head>
    <body>

        <main class="container">
            <div class="box a">
                <h2>COMP 3512 Assign2</h2>
                <span>Ann S</span>
            </div>

            <div class="box b">
                <fieldset>
                    <legend>Photo Filters</legend>
                    <input type="text" class="search" placeholder="Enter Country" list="filterList">
                    <datalist id="filterList">
                    </datalist>
                    <ul id="countryFound"></ul>
                </fieldset>

            </div>

            <div class="box c">
                <h2>Browse/Search Results</h2> 
                <section id='country'>
                    
                    <picture></picture>
                    
                    <label>Title: </label>
                    <span id="photoTitle"></span> 

                    <section>
                        <button id="viewButton" value='txt'>View Image</button>
                    </section>
                    
                    <section>
                        <button id="favsButton" value='txt'>Add to Favourites</button>
                    </section>
                    
                </section>

                <div id='city'>
                    <h2 id="cityName"></h2> 
                  
                    <picture></picture>

                    <label>Title: </label>
                    <span id="photoTitle"></span> 
                    
                    <section>
                        <button id="viewButton" value='txt'>View Image</button>
                    </section>

                    <section>
                        <button id="favsButton" value='txt'>Add to Favourites</button>
                 
                    </section>
                </div>

            </div>

            <div class="box e"> 
                <h3>All Countries</h3>
                <ul id="countryList"></ul>
            </div>

            <div class="box f">
                <fieldset id = 'cityField'>
                    <legend>City Search</legend>
                    <input type="text" class="search2" placeholder="Enter City" list="filterList2">
                    <datalist id="filterList2">
                    </datalist>
                </fieldset>
                <ul id="cityFound"></ul>
            </div>

           

            <div class="box h"> 
                <h3></h3>
                <ul id="cityList"></ul>
            </div>

            <div class="box i">

                <section id='hoverBox'>
                    <h2>Credit Details</h2> 

                    <label>Actual:</label>
                    <span id='actual'></span> 

                    <label>Creator:</label>
                    <span id="creator"></span> 

                    <label>Source:</label>
                    <span id="source"></span> 


                    <h2>Picture Details</h2> 

                    <label>Make:</label>
                    <span id="hoverMake"></span> 

                    <label>Model:</label>
                    <span id="hoverModel"></span> 

                    <label>Exposure Time:</label>
                    <span id="hoverExpTime"></span> 

                    <label>Aperture:</label>
                    <span id="hoverAperture"></span> 

                    <label>focal Length:</label>
                    <span id="hoverFocalLength"></span> 

                    <label>iso:</label>
                    <span id="hoverIso"></span> 


                    <h2>Colors Details</h2> 

                </section>

            </div>

            <article class="box j">

                <section>
                    <button id="speakButton" value='txt'>Speak Title</button>
                </section>



                <section id='info'>
                    <h2 id="pictureName"></h2> 
                    <label>User Name:</label>
                    <span id="userName"></span> 

                    <label>location:</label>
                    <span id="picLocation"></span> 

                </section>

                <section>
                    <button id="descriptionsTab" >Description</button>
                    <button id="detailsTab" >Details</button>
                    <button id="mapsTab" >Maps</button>
                </section>

                <section id='descriptionData'>
                    <h2>Description</h2> 
                </section>

                <section id='detailData'>
                    <h2>Details</h2> 
                    <label>Make:</label>
                    <span id="picMake"></span> 

                    <label>Model:</label>
                    <span id="picModel"></span> 

                    <label>Exposure Time:</label>
                    <span id="exposureTime"></span> 

                    <label>Aperture:</label>
                    <span id="aperture"></span> 

                    <label>focal Length:</label>
                    <span id="focalLength"></span> 

                    <label>iso:</label>
                    <span id="iso"></span>    
                </section>

                <section id='mapData'> 
                    <h2>Map</h2> 
                </section>

                <section>
                    <button id="closeTab" >Close</button>
                </section>

            </article> 

        </main>    
        <script src="assign1.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE&callback=initMap"
                async defer></script>
    </body>
</html>