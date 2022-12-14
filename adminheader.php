<?php
ob_start();
session_start();

include_once "functions/admin.php";
if (isset($_SESSION['log']) && $_SESSION['log'] == "#AdMin#") {
} else {

    $msg = "Only An Administrator Can Access This Page!";
    header("Location: login.php?msg=$msg");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8 ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-to">
    <meta name="author" content="leonard lebechi">
    <meta name="description" content="your one stop shop for wristwatches">
    <meta name="keywords" content="czar's Place,wristwatch,luxury watch,mechanical watch,
    time,timepiece,online store,watch store,watch collection,
    lagos,rolex,hublot,patek phillepe,">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">

    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title><?php if (isset($admin)) {
                echo $admin . " | ";
            };

            ?><?php if (!defined("CZARS")) {
                    define("CZARS", "Czar's Place");
                    echo CZARS;
                } ?> Haven for luxury wristwatches</title>

    <style>
        @font-face {
            font-family: 'czars';
            src: url('Unica_One/UnicaOne-Regular.ttf');
        }

        @font-face {
            font-family: 'czars3';
            src: url('Pacifico/Pacifico-Regular.ttf');
        }

        @font-face {
            font-family: 'czars2';
            src: url('Padauk/Padauk-Regular.ttf');
        }



        #brandname {
            font-family: czars, sans-serif;
            text-decoration: none;
            color: white;
        }

        .bannertxt {
            font-family: czars3, sans-serif;
            color: rgba(0, 0, 0, 0.8);
            font-size: 4.5vw;
            border-radius: 55%;
        }

        #copyright_txt {
            font-family: czars, sans-serif;
            color: white;
            font-size: 1.2vw;
        }

        .row1 {
            font-size: 1.1vw;
            text-transform: capitalize;
        }

        .footr {
            font-family: czars, sans-serif;
            color: white;
        }

        .price {
            color: rgba(0, 0, 0, 0.6);
            margin-top: 2px;
        }

        a,
        a:hover {
            text-decoration: none;
            color: black;
        }

        .nav-item :hover {
            color: white !important;
        }

        #drop :hover {
            color: white !important;
        }

        .navbar-brand:hover {
            color: white !important;
        }

        #acct:hover {
            color: white !important;
        }

        #whatsapp {
            position: fixed;
            justify-content: flex-end;
            display: flex;
            top: 350px;
            right: 20px;
        }

        #spanwhatsapp {
            border: 2px solid white;
            color: rgba(0, 0, 0, 0.9);
            background-color: white;
            font-size: 1vw;
            border-radius: 7%;
            padding: 3px;
        }

        .socials {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 30%;
        }
    </style>

</head>

<body>





    <!-------------NAVBAR----------->
    <div class="container-fluid-sm">
        <div>
            <div class="row " style="border-bottom: 1px solid ;background-color: #050C24;padding-bottom:30px;">
                <div class="col-sm mt-sm-1 pt-sm-2" style="color:rgba(255, 255, 255);">
                    <a href="admindashboard.php" id="brandname">
                        <h1 class="text-center">
                            <?php echo CZARS; ?>
                        </h1>
                    </a>
                </div>
            </div>
        </div>



        <div class="row " style="background-color: #050C24;position:
                sticky;top: 0;z-index:1; padding-left:12px;display:flex; ">
            <div>
                <nav class="navbar navbar-expand navbar-light">
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mb-sm-2 col-sm text-center " style="justify-content:space-around;">
                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="admindashboard.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> Dashboard</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="allproducts.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> Products</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="allbrands.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> All Brands</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="allorders.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b> All Orders</b>
                                </a>
                            </li>
                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="allcustomers.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b>Customers</b>
                                </a>
                            </li>

                            <li class="nav-item col-sm-1">
                                <a class="nav-link " href="allpayment.php" style="color:rgba(255, 255, 255,0.5);font-size: 1.1vw!important;">
                                    <b>Payments</b>
                                </a>
                            </li>
                            <li class="col-sm-2 mt-sm-1">
                                <a href="adminlogout.php" style="color:white;font-size:
             1.1vw!important;" class="btn btn-outline-danger btn-sm"><b>Logout</b>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>