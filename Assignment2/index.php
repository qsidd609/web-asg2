<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/index_css.css">
</head>

<body>
    <header>
        <h3>COMP 3512 Assignment 2 Title Page</h3>
        <ul class="topnav">
            <li><a class="active" href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Browse/Search</a></li>
            <li><a href="">Countries</a></li>
            <li><a href="">Cities</a></li>
            <li><a href="">Upload</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="">Favorites</a></li>
            <li><a href="">Login/Logout</a></li>
            <li><a href="">Sign Up</a></li>
        </ul>
    </header>

    <main>
        <div id="notLoggedIn">
            <button id="login">Login</button>
            <button id="join">Join</button><br>
            <br>
            <div id="search">
                <input type="text" class="search" placeholder="SEARCH BOX FOR PHOTOS">
            </div> <br>
        </div>

        <div id="loggedIn">
            <div id="userInfo">User info
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>

            <div id="search"><input type="text" class="search" placeholder="SEARCH BOX FOR PHOTOS">
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>

            <div id="favorite">Favorited Images
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaassaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>

            <div id="suggestion">Images You May Like
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
            </div>
        </div>

        <div id="toggle">
            <button onclick="toggle()">Toggle Display</button>
        </div>

        <script>
            function toggle(){
                var logged = document.getElementById("loggedIn");
                var notLogged = document.getElementById("notLoggedIn");
                
                if(logged.style.display === "none"){
                    
                    logged.style.display = "grid";
                    notLogged.style.display = "none";
                }
                else{
                    logged.style.display = "none";
                    notLogged.style.display = "block";
                }
               
                
            }
            </script>
    </main>
</body>

</html>