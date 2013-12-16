<?php
require_once 'config.php';

require_once LIB_DIR . 'twitterApi.php';
require_once LIB_DIR . 'twitterUser.php';
/*
try {

    $db = new PDO(
        'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'],
        $config['db']['user'],
        $config['db']['passw'],
        $options);
    
} catch (PDOException $e) {
    
}
*/


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    
    $username = $_POST['username'];
    
    //Create a TwitterOauth object with consumer/user tokens.
    $twitterApi = new TwitterApi($account['consumer_key'], $account['consumer_secret'], $account['authtoken_key'], $account['authtoken_secret']);
    $twitterUser = new TwitterUser($username);

    foreach($twitterApi->getFriends($twitterUser) AS $friend) {
        $twitterUser->addFriend($friend);
    }
    
    //Get the latest tweets
    $tweets = $twitterApi->getTweets($twitterUser, 3);
    $twitterUser->setTweets($tweets);
    
    
    //Get user details
    $details = $twitterApi->getDetails($twitterUser);
    $twitterUser->setDetails($details['profile_image_url'], $details['followers_count'], $details['name']);
    echo json_encode($twitterUser);
}
