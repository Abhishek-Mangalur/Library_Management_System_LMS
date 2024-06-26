<?php
    include "connection.php";
    session_unset();
    // if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    // {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <link rel="stylesheet" href="script.js">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wc{
            font-size: 2rem;
            margin: 10px;
            color: #fff;
        }
        
        .top{
            display: flex;
            justify-content: space-between;
            background-color: grey;
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

        ul li{
            margin: 10px;
            display: inline-block;
            position: relative;
        }

        li:hover{
            text-decoration: underline;
        }

        .option{
            font-size: 1.5rem;
        }

        .rect{
            display: flex;
            align-items: center;
            /* width: 3000px; */
            /* height: 400px; */
            background-color: white;
            /* box-shadow: inset -2px -2px 6px rgba(0,0,0,.5); */
            border-radius: 8%;
            justify-content: space-around;
            margin-top: 30px;
        }

        .sqr{
            border: 1px solid black;
            width: 300px;
            height: 150px;
            margin: 10px;
            text-align: center;
            border-radius: 10px;
            display: grid;
            background-color: #DADADA;
        }
        
        .up{
            padding: 10px;
            border-bottom: 1px solid black;
            font-size: 1.3rem;
        }

        .btn{
            border: 1px solid black;
            padding: 5px;
            border-radius: 5px;
            align-items: end;
            width: 80px;
            height: 35px;
            margin-left: 10px;
            background-color: #0DCAF0;
        }
        .down{
            padding: 20px 0 10px 0;
            font-size: 1.3rem;
        }
        ul li{
            display: inline-block;
            position: relative;
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
            /* width: 160px; */
            position: absolute;
            display: none;
            z-index: 999;
        }

        ul li:hover ul.dropdown{
            display: block;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 1.3rem;
            background-color: #55FFB0;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="top">
            <h2 class="wc">Welcome to Digital Library</h2>
            <a href="logout.php" id="login" style="
            color: #fff; background-color: black;">Logout</a>
        </div><hr>
        <div class="option" style="font-size: 1.5rem; background-color: #55FFB0;">
            <ul>
                <li><a href="#">Home</a></li>
                <li>
                    <a href="#">Users &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertusers.php">Add Users</a></li>
                        <li><a href="displayusers.php">Delete Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Category &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertcategories.php">Add Category</a></li>
                        <li><a href="displaycategories.php">Delete Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Publisher &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertpublisher.php">Add Publisher</a></li>
                        <li><a href="displaypublisher.php">Delete Publisher</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Authour &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertauthors.php">Add Authour</a></li>
                        <li><a href="displayauthors.php">Delete Authour</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Book &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertbooks.php">Add Book</a></li>
                        <li><a href="displaybooks.php">Delete Book</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Copies &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertcopies.php">Add Copies</a></li>
                        <li><a href="displaycopies.php">Delete Copies</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Lending &#x25BE;</a>
                    <ul class="dropdown">
                        <li><a href="insertlending.php">Add Lending</a></li>
                        <li><a href="displaylending.php">Delete Lending</a></li>
                    </ul>
                </li>
            </ul>
        </div><hr><br>
        <marquee behavior="" direction="" style="font-size: 1.3rem;"><i>Library Opnes at Morning 10:00 AM and closes at 8:00 PM | Facilities: E-books, Soft copies | NOTE: A Student can take Maximum 3 Books</i></marquee><br><br><hr>
        <div class="middle">
            <div class="rect">
                <div class="sqr">
                    <div class="up">Users</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from users";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displayusersu.php" class="btn">view</a>
                </div>
                <div class="sqr">
                    <div class="up">Categories</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from category";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaycategoriesu.php" class="btn">view</a>
                </div>
                <div class="sqr">
                    <div class="up">Authors</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from author";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displayauthorsu.php" class="btn">view</a>
                </div>
            </div>
            <div class="rect">
                <div class="sqr">
                    <div class="up">Books</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from book";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaybooksu.php" class="btn">view</a>
                </div>
                <div class="sqr">
                    <div class="up">Copies</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from copies";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaycopiesu.php" class="btn">view</a>
                </div>
                <div class="sqr">
                    <div class="up">Lending</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from lending";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaylendingu.php" class="btn">view</a>
                </div>
            </div>
        </div>
        <br><br><hr><br>
        <footer style="text-align: center; font-size: 1.3rem;">
            &copy; Copyright Reserved by Digital Library <br> 
            Developed By: Abhishek
        </footer><br>
    </div>
</body>
</html>
