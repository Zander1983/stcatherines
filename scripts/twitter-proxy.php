<?php


ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
	'oauth_access_token' => '776357066-jWIbz9ZEJ4KIywvS5DKEyftEZtkTNrrCNrVXebEi',
	'oauth_access_token_secret' => 'Ljq5a7UKPGYqVbq1AfegjBRDA8NhSVnP7zvY97t8Bak',
	'consumer_key' => '2xmicQGImhP2aq7jJe0m8A',
	'consumer_secret' => 'b9NwiN1HpjRI5XszwAAI2dECAPqXHIVkbYFYaAtqnas',
);

$screen_name = $_GET['screen_name'];

if(!isset($screen_name)){
    die();
}


$url = 'http://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$screen_name."&count=10";
$requestMethod = 'GET';


$twitter = new TwitterAPIExchange($settings);


$recentTweets = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();


$output = json_decode($recentTweets);



echo $recentTweets;

