<?php
include "./database/db.php";
$user_id = 2;
$product_id = $_POST['product_id'];
$rating = $_POST['rating'];
// Check rating inside the table
$query = "SELECT COUNT(*) AS countProduct FROM product_rating WHERE product_id = " . $product_id . " and user_id = " . $user_id;
$result = mysqli_query($connection, $query);
$getdata = mysqli_fetch_array($result);
$count = $getdata['countProduct'];
if($count == 0){
 $insertquery = "INSERT INTO product_rating(user_id, product_id, rating) values(". $user_id .", ". $product_id .", ". $rating .")";
 mysqli_query($connection, $insertquery);
}else {
 $updateRating = "UPDATE product_rating SET rating=" . $rating . " where user_id=" . $user_id . " and product_id=" . $product_id;
 mysqli_query($connection, $updateRating);
}
// fetch rating
$query = "SELECT ROUND(AVG(rating),1) as numRating FROM product_rating WHERE product_id=".$product_id;
$result = mysqli_query($connection, $query) or die(mysqli_error());
$getAverage = mysqli_fetch_array($result);
$numRating = $getAverage['numRating'];
$return_arr = array("numRating"=>$numRating);
echo json_encode($return_arr);

?>