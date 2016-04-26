<html>

<!--
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>

-->


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
                    $('#message-list').html(response.news);
                }
            });
        }
        //Every 20 sec check if there is new update
        setInterval(check,5000);
    </script>
</head>
<body>

<?php



$response = array();
 
require_once __DIR__ . '/connection.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from products table
$result = mysql_query("SELECT * FROM clientorders1") or die(mysql_error());
 
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
}
// TUTAJ MASZ WYSWIETLANIE WSZYSTKIEGO
foreach($response["products"] as $key => $value)
        {
        foreach($value as $x => $x_val)
        {
        echo $x." : ". $x_val."<br>";
        }
        echo "<br>";
        }

?>
    <h2>No działaj!</h2>
    <div id="message-list" data-counter="<?php echo (int)$db->check_changes();?>">
        <?php echo $db->get_news();?>
    </div>

</body>
</html>