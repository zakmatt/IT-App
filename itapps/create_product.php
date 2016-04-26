<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
$response = array();
 
// check for required fields
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
 
    // include db connect class
    require_once __DIR__ . '/connection.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO clientorders1(name, price, description) VALUES('$name', '$price', '$description')");
 
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 

    echo json_encode($response);
}
?>