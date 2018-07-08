<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

  @import url(https://fonts.googleapis.com/css?family=Roboto+Slab:700);

  .tiles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .tile {
    position: relative;
    float: left;
    width: 450px;
    height:  330px;
    overflow: hidden;
  }

  .photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    transition: transform .5s ease-out;
  }

</style>
<div class="tiles">
    <div class="tile" data-scale="2.4" data-image="http://ultraimg.com/images/bNeWGWB.jpg"></div>
  </div>

</html>
<script>
$(".tile")
  // tile mouse actions
  .on("mouseover", function() {
    $(this)
      .children(".photo")
      .css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
  })
  .on("mouseout", function() {
    $(this)
      .children(".photo")
      .css({ transform: "scale(1)" });
  })
  .on("mousemove", function(e) {
    $(this)
      .children(".photo")
      .css({
        "transform-origin":
          (e.pageX - $(this).offset().left) / $(this).width() * 100 +
          "% " +
          (e.pageY - $(this).offset().top) / $(this).height() * 100 +
          "%"
      });
  })
  // tiles set up
  .each(function() {
    $(this)
      // add a photo container
      .append('<div class="photo"></div>')
      // some text just to show zoom level on current item in this example
      // set up a background image for each tile based on data-image attribute
      .children(".photo")
      .css({ "background-image": "url(" + $(this).attr("data-image") + ")" });
  });

</script>