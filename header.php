<?php
session_start();

include "includes/db.php";
include "functions/function_cart.php";

$sql="select * from users";
$run=mysql_query($sql);
while($row_pro=mysql_fetch_array($run)){
    $name = $row_pro['uname'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moksha Couture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet"/>
    <link href="css/search.css" rel="stylesheet"/>
    <link href="css/login.css" rel="stylesheet"/>
    <link href="css/details.css" rel="stylesheet"/>
    <link href="css/checkout.css" rel="stylesheet"/>
    <link href="css/product.css" rel="stylesheet"/>
    <link href="css/sidebar.css" rel="stylesheet"/>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .item:nth-child(1) {
            background: url('images/3.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .item:nth-child(2) {
            background: url('images/1.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .item:nth-child(3) {
            background: url('images/2.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .carousel,
        .carousel-inner,
        .carousel-inner .item {
            height: 100%;
        }
.navbar-default{
background-color:#000000;
}
    </style>


</head>
<body>
<header class="navbar fadeInUp" style="top:0px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
               <a href="index.php"> <img class="logo" src="images/Moksha Logo.png" height="45"  width="130" /></a>
               <a href="index.php">  <img class="logo_name" src="images/name.png" height="45"  width="130"/> </a>
            </div>
            <div class="col-sm-9">
                <div class="row flex">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" class="form-control" style="border-radius: 0;" class="search_pro" placeholder="Search for...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" onclick="product()" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                  </span>
                        </div>
                    </div>
                   
<ul class="nav navbar-nav navbar_links">

      <li><a href="index.php">HOME</a></li>
      <li><a href="about.php">ABOUT US</a></li>
      <li><a href="products.php">PRODUCTS</a></li>
      <li><a href="contact.php">CONTACT US</a></li>
    </ul>

                    <?php
                    if($flag == 1) { ?>
                        <ul class="cart_list">
                            <li>
                                <p class="cart_no"><?php getCn(); ?></p>
                            </li>
                    <?php
                        echo "
<li>
<a href='cart.php'><i class='fa fa-shopping-cart' aria - hidden = 'true' style='font-size:30px;color:white;'></i ></a>
</li>
</ul>
";
                    }
                    else{
                        echo "";
                    }
                    ?>
                    <div>
                        <?php
                        if (!empty($_SESSION['usernamec'])) {
                            echo"
                       
                       ";
                        }
                        else{
                            echo "";
                        }
                        ?>
                    </div>



 <div class="col-sm-1">
                        <div class="btn-group pull-right">
                            <button type="button"  class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <?php if(!empty($_SESSION['usernamec'])){
                                     echo "Hi"." ".$_SESSION['usernamec'];
                                }
                                else{
                                   echo" <span> <i class='fa fa-user' aria-hidden='true'></i> </span>";
                                }?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                if(empty($_SESSION['usernamec'])){
                                    echo "
                                    <li>
                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#loginModal'>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href='javascript:void(0);' data-toggle='modal' data-target='#registerModal'>
                                        Register
                                    </a>
                                </li>
                                <li><a href='admin_area/index.php'>Admin</a></li>
                                    ";
                                }

                                else{
                                    echo "
                                    <!-- <li role='separator' class='divider'></li>-->
              
                            </button>
                                <li><a href='myaccount.php'>My Account</a></li>
                                <li><a href='order_history.php'>Order History</a></li>   
                                <li><a href='wish_list.php'>Wish List</a></li>
                                <li><a href='logout.php'>Log out</a></li>
                                    ";
                                }


                              ?>



                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row login">
                        <div class="col-sm-6">
                            <form role="form" action="check_log.php" method="post">
                                <div class="form-group text-center">
                                    <div class="logo">
                                        <img src="images/Moksha Logo.png" class="logo"><br>
                                        <img src="images/name.png" class="logo-name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="uname" id="userid" placeholder="Enter email or username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" name="pwd" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block btn-success">Submit</button>
                                </div>
                                <div class="form-group last-row">
                                    <a href="javascript:void(0);" data-toggle="modal" class="pull-right" data-target="#forgotModal">
                                        Forgot password
                                    </a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Guest Modal -->
<div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Guest</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row login">
                        <div class="col-sm-6">
                            <form role="form" action="guest.php" method="post">
                                <div class="form-group text-center">
                                    <div class="logo">
                                        <img src="images/Moksha Logo.png">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="uname" id="userid" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="email" id="userid" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="phone" id="userid" placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block btn-success">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalRegister">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row login">
                        <div class="col-sm-6">
                            <form role="form" action="check.php" method="post">
                                <div class="form-group text-center">
                                    <div class="logo">
                                        <img src="images/Moksha Logo.png" class="logo"><br>
                                        <img src="images/name.png" class="logo-name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="uname" id="userid" placeholder="Enter username" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="email" id="userid" placeholder="Enter email" required />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" name="pwd" id="password" placeholder="Enter password" required />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" name="re-pwd" id="confirm_password" placeholder="Enter password again" required />
                                    <span id='message'></span>
                                </div>

                               <!-- <script>

                                $('#password, #confirm_password').on('keyup', function () {
                                    if ($('#password').val() == $('#confirm_password').val()) {
                                        $('#message').html('Matching').css('color', 'green');
                                    } else
                                        $('#message').html('Not Matching').css('color', 'red');
                                });

                                </script> -->
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="phone" id="userid" placeholder="Enter phone" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block btn-success">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Forgot Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="myModalforgot">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row login">
                        <div class="col-sm-6">
                            <form role="form" action="check_log.php" method="post">
                                <div class="form-group text-center">
                                    <div class="logo">
                                        <img src="images/Moksha Logo.png">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="uname" id="userid" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    var iScrollPos = 0;
    $(window).scroll(function () {
        var iCurScrollPos = $(this).scrollTop();
        console.log(iCurScrollPos);
        if (iCurScrollPos > 100) {
            $('header').addClass('navbar-fixed-top');
            $('header').addClass('navbar-default');
        } else {
            $('header').removeClass('navbar-fixed-top');
            $('header').removeClass('navbar-default');
        }
        iScrollPos = iCurScrollPos;
    });

    $("#reg_btn").click(function(){
        $("loginModal").hide();
    });

    $('#carouselFade').carousel();

</script>
