<?php
    session_start();
    require("header2.php");
    $mysqli = new mysqli('93.115.101.3','andreim1_db','Mcr2001@','andreim1_db') or die(mysqli_error($mysqli));
    if(isset($_POST["uname"]) && isset($_POST["upassword"])){
        $uname=$_POST["uname"];
        $upassword=$_POST["upassword"];
        $utype=$_POST["utype"];
        $mysqli->query("INSERT INTO users (uname,upassword,utype) VALUES ('$uname','$upassword','user')") or die($mysqli->error);
        header("Location: register.php?register=success");
    }
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSL | Add User</title>
    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

input[type="radio"]{
    width:30px !important;
    height:30px !important;
    margin:auto;
}

.form-check{
    display:flex;
    flex-direction:column;
}
.form-check-input:checked {
    background-color: #56a8c2!important;
    border-color: #56a8c2!important;
}
.checkboxes{
    display:flex;
    justify-content:space-between;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    color: #1c1e21;
}

main {
    height: 90vh;
    width: 100vw;
    position: relative;
    margin: 0 auto;
}

footer {
    height: 10vh;
    background-color: #ffffff;
}

.row {
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    max-width: 1000px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.colm-logo {
    flex: 0 0 50%;
    text-align: left;
}

.colm-form {
    flex: 0 0 40%;
    text-align: center;
}

.colm-logo img {
    max-width: 400px;
}

.colm-logo h2 {
    font: 26px;
    font-weight: 400;
    padding: 0 30px;
    line-height: 32px;
}

.colm-form .form-container {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    max-width: 400px;
}

.colm-form .form-container input, .colm-form .form-container .btn-login {
    width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
}

.colm-form .form-container input {
    border: 1px solid #56a8c2;
    color: #000000;
    padding: 0 8px;
    outline: none;
}

.colm-form .form-container input:focus {
    border-color: #56a8c2;
    box-shadow: 0 0 0 2px #e7f3ff;
}

.colm-form .form-container .btn-login {
    background-color: #56a8c2;
    border: none;
    border-radius: 6px;
    font-size: 20px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
}

.colm-form .form-container a {
    display: block;
    color: #56a8c2;
    font-size: 14px;
    text-decoration: none;
    padding: 10px 0 20px;
    border-bottom: 1px solid #dadde1;
}

.colm-form .form-container a:hover {
    text-decoration: underline;
}

.colm-form .form-container .btn-new {
    background-color: #56a8c2;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    line-height: 48px;
    padding: 0 16px;
    color: #ffffff;
    font-weight: 700;
    margin-top: 20px; 
}

.colm-form p {
    font-size: 14px;
}

.colm-form p a {
    text-decoration: none;
    color: #56a8c2;
    font-weight: 600;
}

.colm-form p a:hover {
    text-decoration: underline;
}

.footer-contents {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
}

footer ol {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    padding: 10px 0;
}

footer ol:first-child {
    border-bottom: 1px solid #dddfe2;
}
           
footer ol:first-child li:last-child button {
    background-color: #56a8c2;
    border: 1px solid #ccd0d5;
    outline: none;
    color: #56a8c2;
    padding: 0 8px;
    font-weight: 700;
    font-size: 16px;
}

footer ol li {
    padding-right: 15px;
    font-size: 12px;
    color: #385898;
}

footer ol li a {
    text-decoration: none;
    color: #385898;
}

footer ol li a:hover {
    text-decoration: underline;
}

footer small {
    font-size: 11px;
}
    </style>
    <!-- <link rel="stylesheet" href="style2.css"> -->
    
</head>
    <?php
    if(isset($_GET["register"]) && $_GET["register"]=="success"){
            echo '<script>alert("Done! The user can login now!")</script>';
        }
    ?>
<body>

    <main>
        <div class="row">
            <div class="colm-logo">
                <img src="https://static.vecteezy.com/system/resources/previews/001/188/041/non_2x/heartbeat-long-line-png.png" alt="Logo">
                <h2>Let's make everything easier.</h2>
            </div>
            <div class="colm-form">
                <form class="form-container" action="register.php" method="POST"> 
                    <h2>Create an account</h2>
                    <br>
                    <input type="text" name="uname" minlength="5" placeholder="Pick an Username">
                    <input type="password" minlength="4" name="upassword" placeholder="Password">
                    <div class="checkboxes">
                        <div >
                            
                        </div>
                        <br>
                        <div >
                            
                        </div>
                    </div>
                    <input class="btn-login" type="submit" ></input>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-contents">

            <small>MySimpleLife © 2022</small>
        </div>
    </footer>
</body>


</html>