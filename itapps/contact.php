<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><title>Contact</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
   <link href="styles.css" media="all" rel="Stylesheet" type="text/css" /> 
</head>

<body>
  <header class="container">
    <div class="row">
      <nav class="col-sm-11 text-right">
        <a class="btn btn-primary" href="mainsite.php" role="button">StartPage</a>
        <a class="btn btn-primary" href="index.php" role="button">Recived Orders</a>
        <a class="btn btn-primary" href="statistics.php" role="button">Statistics</a>
        <a class="btn btn-primary" href="contact.php" role="button">Contact</a>
      </nav>
    </div>
  </header>
	<section class="jumbotron">
    <div class="container">
      <div class="row"/>
      <div class="row">
    		<div class="col-md-2"></div>
    		<div class="col-md-5">
    			<h1 id="contact">Contact us!</h1>
    			<h2>ul. wybrzeze Stanislawa Wyspianskiego 27</h2>
    			<h2>50-370 Wroclaw</h2>
    			<h3>Phone number: 724 568 878</h3>
    		</div>
      	<div id="map-container" class="col-md-3"></div>
      </div>
    </div>
  </section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>	
 
      function init_map() {
		var var_location = new google.maps.LatLng(51.108693,17.060010);
 
        var var_mapoptions = {
          center: var_location,
          zoom: 14
        };
 
		var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title:"Venice"});
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
 
		var_marker.setMap(var_map);	
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);
 
    </script>
  <footer class="container">
    <div class="row">
      <p id="foot" font-size="12px" class="col-sm-6">
        &copy; Wiktor Bednarek 
        &copy; Robert Bodziony 
        &copy; Lukasz Kula
        &copy; Marta Kwolik
      </p>
      <p font-size="12px" class="col-sm-4"/>
      <p font-size="12px" class="col-sm-2">
        <a href="http://www.facebook.pl"><img src="http://www.marketingdirecto.com/wp-content/uploads/2013/01/facebook-logo2.jpg"/></a>
        <a href="http://www.twitter.com"><img src="https://lh3.ggpht.com/nn0_2f2yehKR7fnMIZ0XrSWbC5Q0VPP7vNmLMV7ndNFinClynZRO4RBTGfbjVOs1fyA=w300"/></a>
      </p>
    </div>
  </footer>
</body>
</html>
