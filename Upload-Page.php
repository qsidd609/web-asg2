<!DOCTYPE HTML>
<html>
    <head>
        <title>COMP 3512 Assign2</title>
        <link rel="stylesheet" href="css/Desktop_Stylesheet.css" media="screen and (min-width: 600px)">
        <link rel="stylesheet" href="css/Mobile_Stylesheet.css" media="screen and (max-width:600px)">
    </head>
    <body id="uploadPageBody">
        <header id="uploadPageHeader"><h3>Header</h3></header>
        <form id="uploadPageForm" enctype="multipart/form-data", method="post">
            <input type="file" name="photo" id="photo">
            <br>
            <input type="text" name="photoTitle" placeholder="Title of the Photo">
            <br>
            <input type="text" name="photoDescription" placeholder="Description of the Photo">
            <br>
            <select id="uploadPageCountryList">
                <option>Countries</option>
                <option>Add Countries</option>
            </select>
            <br>
            <select id="uploadPageCityList">
                <option>Cities</option>
                <option>Add Cities</option>
            </select>
            <br>
            <input type="submit">
        </form>
    </body>
</html>