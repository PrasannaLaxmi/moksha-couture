<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="page-links">
                    <li><a href="about.php">About</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="admin_area/index.php">Admin</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <address>
                    <strong>MOKSHA COUTURE</strong><br>
                Phase 11,  8-2-293 / 82 / j / 119-A, <br>
                Journalist colony,Road no: 70, <br>
                Jubilee Hills,Hyderabad,<br>
                500 033,Telangana.<br>

                   <abbr title="Phone">P:</abbr> +917993399544
                </address>
                <div class="clearfix"></div>
                <div class="social-icons">
                    <a href="https://www.facebook.com/bootsnipp" class="social">
                        <i id="social-fb" class="fa fa-facebook-square fa-2x social"></i>
                    </a>
                    <a href="https://twitter.com/bootsnipp" class="social">
                        <i id="social-tw" class="fa fa-twitter-square fa-2x social"></i>
                    </a>
                    <a href="https://plus.google.com/+Bootsnipp-page" class="social">
                        <i id="social-gp" class="fa fa-google-plus-square fa-2x social"></i>
                    </a>
                    <a href="mailto:bootsnipp@gmail.com" class="social">
                        <i id="social-em" class="fa fa-envelope-square fa-2x social"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="googleMap"></div>
            </div>
        </div>
        <p class="copyright">Copyright 2017 Moksha Couture All rights reserved. Design:<a href="#"> www.perfectstart.in</a></p>
    </div>
</footer>
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0YmTjRXQeyUejXwoIqpvUPO_YrRLmwqc&callback=myMap"></script>
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

    var $item = $('.carousel .item');
    var $wHeight = $(window).height();
    $item.eq(0).addClass('active');
    $item.height($wHeight);
    $item.addClass('full-screen');

    $('.carousel img').each(function() {
        var $src = $(this).attr('src');
        var $color = $(this).attr('data-color');
        $(this).parent().css({
            'background-image' : 'url(' + $src + ')',
            'background-color' : $color
        });
        $(this).remove();
    });

    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $item.height($wHeight);
    });

    $('.carousel').carousel({
        interval: 6000,
        pause: "false"
    });

    function product() {

        var t1=document.getElementById("search_pro").value;
        window.location = "products.php?id=" +t1 ;

    }
</script>
</body>
</html>