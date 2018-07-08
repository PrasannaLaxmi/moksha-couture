<?php
if(isset($_GET['delete_cat']))
{
include 'inc/function.php';
echo delete_cat();
}

if(isset($_GET['delete_sub_cat']))
{
    include 'inc/function.php';
    echo delete_sub_cat();
}
if(isset($_GET['delete_sub_sub_cat']))
{
    include 'inc/function.php';
    echo delete_sub_sub_cat();
}

if(isset($_GET['delete_product']))
{
    include 'inc/function.php';
    echo delete_product();
}

if(isset($_GET['delete_admin']))
{
    include 'inc/function.php';
    echo delete_admin();
}
if(isset($_GET['delete_taxbillinfo']))
{
    include 'inc/function.php';
    echo delete_taxbillinfo();
}
?>