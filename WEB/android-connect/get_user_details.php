<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
require_once __DIR__ . '/hash_code.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// check for post data
if (isset($_GET["mail"]) && isset($_GET["hash"])) {
    $pid = $_GET['mail'];
	if($_GET['hash'] != $hash) { 
		$response["success"] = 0;
        $response["message"] = "Wrong has code!";
 
        // echo no users JSON
        echo json_encode($response);
		exit; 
	}
    // get a product from products table
    $result = mysql_query("SELECT * FROM users WHERE user_email = '$pid'");
 
    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $product = array();
            $product["id"] = $result["id"];
            $product["user_email"] = $result["user_email"];
            $product["user_password"] = $result["user_password"];
            $product["last_login"] = $result["last_login"];
            $product["user_type"] = $result["user_type"];
            $product["activation_hash"] = $result["activation_hash"];
            // success
            $response["success"] = 1;
 
            // user node
            $response["user"] = array();
 
            array_push($response["user"], $product);
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No user found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No user found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>