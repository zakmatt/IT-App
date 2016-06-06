<html>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
   <link href="styles.css" media="all" rel="Stylesheet" type="text/css" /> 
    </head>
   

<!--
<head>
    <title><?php echo "All products";?></title>
    <meta charset="utf-8">
    <script src="jquery-1.10.2.min.js"></script>
    <script>
        /* AJAX request to checker */
        function check(){
            $.ajax({
                type: 'POST',
                url: 'checker.php',
                dataType: 'json',
                data: {
                    counter:$('#message-list').data('counter')
                }
            }).done(function( response ) {
                /* update counter */
                $('#message-list').data('counter',response.current);
                /* check if with response we got a new update */
                if(response.update==true){
                    $('#message-list').html(response.clientorders1;
                }
            });
        }
        //Every 4 sec check if there is new update
        setInterval(check,2000);
    </script>
</head>
<body>
-->

<?php

 function display() {
$response = array();
 
require_once __DIR__ . '/connection.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from products table
$result = mysql_query("SELECT * FROM orders_tab") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["ID"] = $row["pid"];
        $product["NAME"] = $row["name"];
		$product["DESC"] = $row["description"];
        $product["PRICE"] = $row["price"];
        $product["CREATED_AT"] = $row["created_at"];
 
        // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    //echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
    $db->get_news();
}
?> 
<h:form>
			<div id="legend">Orders</div>
			<fieldset id="ordersFieldset">
				
			
					<div id="searchresbar" align="center">
						<?php
							foreach($response["products"] as $key => $value)
									{?>
										<p id="listitems">
									<?php
									foreach($value as $x => $x_val)
									{
									echo $x." : ". $x_val." |  ";
									}?>
									</p>
									
									<?php
									echo "<hr>";
									}
								}

								
							?>
					</div>
				
			</fieldset>
			</h:form>

    


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
    <div class="jumbotron">
        <?php echo display();?>
    </div>

    <div id="message-list" data-counter="<?php echo (int)$db->check_changes();?>">
        <?php echo $db->get_news();?>
    </div>
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