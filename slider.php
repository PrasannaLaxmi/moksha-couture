<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<style>

    .carousel-fade .carousel-inner .item {
        opacity: 0;
        transition-property: opacity;
    }

    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }

    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }

    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }

    .carousel-fade .carousel-control {
        z-index: 2;
    }
    @media all and (transform-3d), (-webkit-transform-3d) {
        .carousel-fade .carousel-inner > .item.next,
        .carousel-fade .carousel-inner > .item.active.right {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.prev,
        .carousel-fade .carousel-inner > .item.active.left {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .carousel-fade .carousel-inner > .item.next.left,
        .carousel-fade .carousel-inner > .item.prev.right,
        .carousel-fade .carousel-inner > .item.active {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }
    .carousel-caption {

    }
    .carousel-caption h3 {
        font-size: 30px;
        font-family: 'Lato', sans-serif;
    }
    .carousel,
    .carousel-inner,
    .carousel-inner .item {
        height: 100%;
    }
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

</style>
<div style='text-align:center;'>

</div>
<div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="carousel-caption">
                <a href="products.php" id="shop_btn">SHOP NOW</a>

            </div>
        </div>
        <div class="item">
            <div class="carousel-caption">

                <a href="products.php" id="shop_btn">SHOP NOW</a>
            </div>
        </div>
        <div class="item">
            <div class="carousel-caption">

                <a href="products.php" id="shop_btn">SHOP NOW</a>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carouselFade" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carouselFade" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
    $('#carouselFade').carousel();
</script>