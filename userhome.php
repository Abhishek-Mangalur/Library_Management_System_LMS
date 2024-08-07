<?php
session_start();
include "connection.php";

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: login.php"); // Redirect to login page if not authenticated
    exit();
}

$user = $_SESSION['uname'];
$query = "SELECT * FROM users WHERE uname = '$user'";
$result = mysqli_query($conn, $query);
$results = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Digital Library</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }
        .top{
            display: flex;
            justify-content: space-between;
            background-color: #333;
        }
        .down{
            padding: 20px 0 10px 0;
            font-size: 1.3rem;
        }
        .wc{
            font-size: 2rem;
            margin: 10px;
            color: #fff;
        }
        .main {
            flex: 1;
        }
        a{
            text-decoration: none;
            color: black;
        }
        #login{
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin: 10px;
            height: 40px;
        }
        #login:hover{
            text-decoration: underline;
        }
        .rect{
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8%;
            justify-content: space-around;
            margin-top: 30px;
        }
        .sqr{
            border: 1px solid black;
            margin: 10px;
            text-align: center;
            border-radius: 10px;
            display: grid;
            background-color: #DADADA;
        }
        .up{
            border-bottom: 1px solid black;
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAaJS0dnDYQ5NkVr30LWhCjQoMLtm6BC0TDA&s');
            background-size: 300px 300px;
            border-radius: 10px;
            background-repeat: no-repeat;
            background-position: center;
            height: 300px;
            width: 300px;
        }
        .down{
            padding: 20px  0;
            text-align: left;
            margin-left: 10%;
        }
        /* Navbar Container */
        .navbar-container {
            overflow-x: auto;
            white-space: nowrap;
            background-color: #333;
            font-size: 1.4rem;
        }

        /* Scrollable Navbar */
        .scrollable-navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .scrollable-navbar li {
            display: inline-block;
        }

        .scrollable-navbar li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .scrollable-navbar li a:hover {
            background-color: #333;
            color: #fff;
            text-decoration: underline;
        }

        /* Content */
        .content {
            padding: 20px;
            text-align: center;
        }
        ul li a{
            display: block;
            color: black;
            text-decoration: none;
            text-align: left;
        }
        ul li ul.dropdown li{
            display: block;
        }

        ul li ul.dropdown{
            position: absolute;
            display: none;
            z-index: 999;
        }

        ul li:hover ul.dropdown{
            display: block;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #333;
            align-items: center;
            align-content: center;
            text-align: center;
        }
        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="top">
            <h2 class="wc">Hello <?php if ($result = mysqli_fetch_assoc($result)) {
                echo "" . $result['uname'] . "";
            } else {
                echo "No data found";
            } ?></h2>
            <a href="logout.php" id="login" style="color: #fff; background-color: black;">Logout</a>
        </div><hr>

        <div class="main">
            <div class="navbar-container">
                <nav class="scrollable-navbar">
                    <ul>
                        <li>
                            <a href="rmdbooks.php">Recommended Books</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div><hr>

        <div class="middle">
            <div class="rect">
                <div class="sqr">
                    <div class="up"></div>
                    <div class="down">
                        <?php
                        if ($result = mysqli_fetch_assoc($results)) {
                            echo "
                                Name: " . $result['uname'] . " <br><br>
                                USN: " . $result['usn'] . " <br><br>
                                Branch: " . $result['branch'] . " <br><br>
                                Email: " . $result['umail'] . "
                            ";
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><hr>

    <footer style="text-align: center; font-size: 1.3rem;">
        Copyright &copy; Reserved by Digital Library <br>
        Developed By: Abhishek
    </footer>
</body>
</html>
