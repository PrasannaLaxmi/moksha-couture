<?php 
if(!isset($_GET['viewall_cat']))
{
    if(!isset($_GET['viewall_sub_cat']))
    {
        if(!isset($_GET['add_products']))
        {
            if(!isset($_GET['viewall_products']))
            {
                if(!isset($_GET['admin_customers']))
                {
                    if(!isset($_GET['admin_accounts']))
                    {
                        if(!isset($_GET['offers']))
                        {
                            if(!isset($_GET['orders']))
                            {
                                if(!isset($_GET['add_sub_cat']))
                                {
                                    if(!isset($_GET['add_category']))
                                    {
                                        if(!isset($_GET['coupons']))
                                        {
                                            if(!isset($_GET['dashboard']))
                                            {
                                                if(!isset($_GET['add_coupon']))
                                                {
                                                    if(!isset($_GET['admin_guestcustomers']))
                                                    {
                                                        if(!isset($_GET['completedorders']))
                                                        {
                                                            if(!isset($_GET['viewall_history']))
                                                            {
                                                                if(!isset($_GET['bulk']))
                                                                {
                                                                    
                                                                    if(!isset($_GET['selective']))
                                                                    {
                                                                        if(!isset($_GET['edit_orderstatus']))
                                                                        {
                                                                            if(!isset($_GET['edit_orderstatuss']))
                                                                            {
                                                                                if(!isset($_GET['taxbillinfo']))
                                                                                {
                                                                                    if(!isset($_GET['viewall_taxbillinfo']))
                                                                                    {
                                                                                        if(!isset($_GET['add_sub_sub_cat']))
                                                                                        {
                                                                                            if(!isset($_GET['viewall_sub_sub_cat']))
                                                                                            {
                                                                                                if(!isset($_GET['show_year']))
                                                                                                {
                                                                                                    
                                       
    ?>
    <div class="col-md-6">
    <?php 
    if(isset($_GET['edit_cat']))
    {
        include 'edit_cat.php';
    }
    if(isset($_GET['edit_sub_cat']))
    {
        include 'edit_sub_cat.php';
    }
    if(isset($_GET['edit_sub_sub_cat']))
    {
        include 'edit_sub_sub_cat.php';
    }
    if(isset($_GET['edit_product']))
    {
        include 'edit_product.php';
    }
    if(isset($_GET['edit_admin']))
    {
        include 'edit_admin.php';
    }
    if(isset($_GET['edit_coupon']))
    {
        include 'edit_coupon.php';
    }
    if(isset($_GET['update_orderstatus']))
    {
        include 'update_orderstatus.php';
    }
    if(isset($_GET['edit_orderstatus']))
    {
        include 'edit_orderstatus.php';
    }
    if(isset($_GET['edit_orderstatuss']))
    {
        include 'edit_orderstatuss.php';
    }
    if(isset($_GET['edit_taxbillinfo']))
    {
        include 'edit_taxbillinfo.php';
    }
    ?>
</div>
</div>
    <?php
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                        }
                                        
                                       }
                                    
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>
    


