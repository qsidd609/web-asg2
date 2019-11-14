
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
                    <legend>Welcome, User</legend>
                </fieldset>

            </div>

            <div class="box c">
                <h2>Favourited Images</h2> 
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

              

                </main>    
            <script src="assign1.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzzAL5uy4nPTub5D_OhVo0oF20Arov7jE&callback=initMap"
                    async defer></script>
            </body>
        </html>