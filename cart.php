<?php
$flag =1;
include "includes/header.php";

echo $_SESSION['user_id'];


?>
	<div class="container main-container">
        <div class="row">
            <div class="col-sm-8">
                   <?php getCartPro(); ?>
            </div>
            <div class="col-sm-4">
                <?php getSum(); ?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 pull-right">
            <?php
            if(!empty($_SESSION['usernamec'])){
                echo "";
            }
            else {
                echo " <div class='col-md-6 pull-right'>
                         
                        </div>";
            }
            ?>
        </div>
        </div>
    </div>


<?php include'includes/footer.php';?>
