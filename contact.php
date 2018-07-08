	<?php
    $flag = 0;
    include 'includes/header.php';?>
    <!--
<div class="row" style="margin-top:7em;">
	<div class="col-md-6" >
		<div id="content_wrapper" >
			<div id="left_con">
				<h4>CONTACT</h4>
					<form action="enter_con.php" method="post">
						<input type="text" class="con_inp" name="con_name" placeholder="Enter your name" required/>
						<input type="email" class="con_inp" name="con_email" placeholder="Enter your email" required/ >
						<input type="text" class="con_inp" name="con_mob" placeholder="Enter your phone number" required/>
						<textarea placeholder="Enter the message" rows="5" columns="20" name="con_msg" required></textarea>
						<button id="snd" style="background:#272727;
						padding:10px;color:white;border:border: 1px solid #eaeaea;">Send Message</button>
					</form>
			</div>
	
	<div class="col-md-6" >
		<div id="right_con">
			<h4>CONTACT INFO</h4>
				<form action="#" method="post">
					<p><span class="glyphicon glyphicon-phone"></span>+9701460919</p>
					<p><span class="glyphicon glyphicon-envelope"></span>crazygamerzz.com</p>
					<p><span class="glyphicon glyphicon-home"></span>crazygamerzz.com</p>
				</form>
		</div>
			
	</div> 
</div>
</div>
</div>
<div id="map">
				<?php include 'includes/map.php';?>
			</div>-->
<!-- End Box -->

<div class="container">
    <div class="row" style="margin-top:7em;">
        <div class="col-md-6">
            <h4>CONTACT</h4>

            <form action="enter_con.php" method="post" >

                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputusername" aria-describedby="username" placeholder="Enter User Name" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your message"></textarea>
                </div>
            </form>

                <button id="snd" style="background:#272727;
						padding:5px;color:white;border:border: 1px solid #eaeaea;">Send Message</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>CONTACT INFO</h4>
            <p style="font-size:15px;"><span class="glyphicon glyphicon-phone"></span>+917993399541</p>
            <p style="font-size:15px;"><span class="glyphicon glyphicon-envelope"></span> reachus@mokshacouture.com</p>
            <address>
                <p style="font-size:15px;"><span class="glyphicon glyphicon-map-marker"></span>
                <strong>MOKSHA COUTURE</strong><br>
                Phase 11,  8-2-293 / 82 / j / 119-A, <br>
                Journalist colony,Road no: 70, <br>
                Jubilee Hills,Hyderabad,<br>
                500 033,Telangana.<br>
                

                <abbr title="Phone">P:</abbr> +917993399544
            </address>
            </p>
        </div>

    </div>
</div>


<?php include 'includes/footer.php';?>		
	</body>
</html>

<script>


 	$(document).ready(function(){
				$('.dropbtn').click(function(){
				    $('.dropdown-content').toggle("slow");
				    });


    $("#btn2").click(function(){
        $(".box_login").hide();
		$(".box_signup").show();
		
    });
	
	$("#log_click").click(function(){
        $(".box_signup").hide();
		$(".box_login").show();
		
    });
	
	$("#forgot_pwd").click(function(){
        $(".box_signup").hide();
		$(".box_login").hide();
		$(".box_forgot").show();
		
		
    });
});


</script>