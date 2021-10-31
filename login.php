<?php
require_once 'vendor/autoload.php';
$clientID = "692956272863-pfp0v7irs9ual5fe40kvj9f2titdbj4u.apps.googleusercontent.com";
$clientSecret = "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";
$redirectUrl = "http://localhost/login_Page/login.php";
$client = new Google_Client();
$client->setclientID($clientID);
$client->setclientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope("profile");
$client->addScope("email");
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token);
  //ambil data
  $get = new Google_Service_Oauth2($client);
  $google_info = $get->userinfo->get();
  session_start();
  // initialize session variables
  $_SESSION['email'] = $google_info->email;
  $_SESSION['nama'] = $google_info->name;
  header('Location: http://localhost/login_page/home.php');
} else {
  header("http://localhost/login_page/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <a href="<?= $client->createAuthUrl() ?>"><button id="login">Login with Google Account</button></a>
    </div>
</body>

</html>