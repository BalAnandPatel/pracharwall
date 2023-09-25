<?php
include "../../constant.php";
if(isset($_POST["business_owner"]))
{

$url = $URL."rating/read_rating.php";
$business_owner = $_POST["business_owner"];
$average_rating = 0;
$total_review = 0;
$five_star_review = 0;
$four_star_review = 0;
$three_star_review = 0;
$two_star_review = 0;
$one_star_review = 0;
$total_user_rating = 0;
$review_content = array();

$data = array("business_owner"=>$business_owner);
// print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
// print_r($response);
$result = json_decode($response);
 // print_r($result);

    
$counter=0;  
foreach($result as $key => $value){
foreach($value as $key1 => $value1)
{


$review_content[] = array(
			'review_id'		=>	$value1->review_id,
			'user_name'		=>	$value1->user_name,
			'user_review'	=>	$value1->user_review,
			'review_reply'	=>	$value1->review_reply,
			'reply_by'	    =>	$value1->reply_by,
			'updated_on'	=>	$value1->updated_on,
			'rating'		=>	$value1->user_rating,
			'datetime'		=>	date('l jS, F Y h:i:s A', $value1->created_on)
		);


	if($value1->user_rating == '5')
		{
			$five_star_review++;
		}

		if($value1->user_rating == '4')
		{
			$four_star_review++;
		}

		if($value1->user_rating == '3')
		{
			$three_star_review++;
		}

		if($value1->user_rating == '2')
		{
			$two_star_review++;
		}

		if($value1->user_rating == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $value1->user_rating;

	}}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);
}
?>