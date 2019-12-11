<?php
session_start();

$firstName = "";
$surName = "";
$city = "";
$country = "";
$email = "";
$password = "";
$password2 = "";
$errors = array();

//connect to database
$conn = mysqli_connect("sql309.epizy.com", "epiz_24904799", "Wn70piLcid", "epiz_24904799_travel");

//Registration
if (isset($_POST['submit'])) {
    //receive all input values from the form
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $surName = mysqli_real_escape_string($conn, $_POST['surname']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    //form validation
    if (empty($firstName)) {
        array_push($errors, "First name is required");
    }
    if (empty($surName)) {
        array_push($errors, "Last name is required");
    }
    if (empty($city)) {
        array_push($errors, "City is required");
    }
    if (empty($country)) {
        array_push($errors, "Country is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $password2) {
        array_push($errors, "The two passwords do not match");
    }

    //check database to make sure a user does not already exist with same email
    $user_check_query = "SELECT * FROM userslogin WHERE UserName='$email' LIMIT 1";
    $checkResult = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($checkResult);

    if ($user) {
        if ($user['UserName'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        $options = array("cost" => 12);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $sql = "insert into userslogin (UserName, Password) value('" . $email . "','" . $hashPassword . "')";
        $sql2 = "insert into users (FirstName, LastName, City, Country, Email) value('" . $firstName . "','" . $surName . "','" . $city . "','" . $country . "','" . $email . "')";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        $_SESSION['email'] = $email;
        $_SESSION['city'] = $city;
        //$_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

//Login user
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        
        $sql = "SELECT * FROM userslogin WHERE UserName = '".$email."'";
        $rs = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($rs);

        if ($numRows  == 1) {
            $row = mysqli_fetch_assoc($rs);
            if (password_verify($password, $row['Password'])) {
                
                $_SESSION['email'] = $email;
                $_SESSION['city'] = $city;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');

            } else {
                array_push($errors, "Wrong password");
            }
        } else {
            array_push($errors, "No user found");
        }
    }
}


?>
<!--https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database-->