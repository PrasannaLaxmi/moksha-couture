<?php
include "includes/db.php";


$colour = array();

if(isset($_REQUEST['colour'])){
    //query string value to array and removing empty index of array
    $colour = array_filter(explode("-",$_REQUEST['colour']));
}

?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<div class="list-group">


    <?php

    $sql = "select sub_cat.sub_cat_name, sub_sub_cat.sub_sub_cat_name, sub_cat.sub_cat_id,main_cat.cat_id,main_cat.cat_name from
main_cat left join sub_cat on main_cat.cat_id=sub_cat.main_cat_id  left join sub_sub_cat ON sub_cat.sub_cat_id=sub_sub_cat.subcat_id";


    $lastcat = 0;
    $lastmain = 0;

    $query = mysql_query($sql);

    while ($row = mysql_fetch_array($query)) {
        $cat_name = $row['cat_name'];
        $cat_id = $row['cat_id'];
        $sub_cat_id = $row['sub_cat_id'];
        $sub_cat_name = $row['sub_cat_name'];
        $sub_sub_cat_name = $row['sub_sub_cat_name'];
        if ($lastmain != $row['cat_id']) {
            $lastmain = $row['cat_id'];

        }

        if ($lastcat != $row['sub_cat_id']) {
            $lastcat = $row['sub_cat_id'];
    ?>

    <div class="main-category">
        <div class="title-category">
            <h4><?php  echo $row['sub_cat_name'];?></h4>
            <span class="pull-right cart"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
            <div class="clearfix"></div>
        </div>
        <div class="show">
            <?php


            }

            $lastsub = 0;
           // $query = "select * from sub_sub_cat ";
            //$rs = mysql_query($query) or die("Error : ".mysql_error());

            while($color_data = mysql_fetch_assoc($sql)){


                ?>

                <a href="javascript:void(0);" class="list-group-item">

                    <div class="col-md-4">
                        <input type="checkbox" class="item_filter colour" value="<?php echo $color_data['sub_sub_cat_id']; ?>" <?php if(in_array($color_data['sub_sub_cat_id'],$colour)){ echo "checked";  } ?> >
                        <?php echo $color_data['sub_sub_cat_name']; ?>
                    </div>
                </a>
            <?php  }?>
<?php
    

    ?>

<?php





    $query = "select * from sub_sub_cat ";
    $rs = mysql_query($query) or die("Error : ".mysql_error());
    while($color_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="list-group-item">

            <div class="col-md-4">
            <input type="checkbox" class="item_filter colour" value="<?php echo $color_data['sub_sub_cat_id']; ?>" <?php if(in_array($color_data['sub_sub_cat_id'],$colour)){ echo "checked";  } ?> >
            <?php echo $color_data['sub_sub_cat_name']; ?>
            </div>
        </a>
    <?php  }?>
</div>
</html>


<?php
$query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id limit 0,12";
//filter query start
if(!empty($colour)){
    $colordata =implode("','",$colour);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$colordata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
    echo $pro_name;
}
}
?>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script>
    $(function(){
        $('.item_filter').click(function(){
            var colour = multiple_values('colour');
            var url ="test7.php?colour="+colour;
            window.location=url;
        });

    });

    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val.join('-');
    }

</script>

