<?php 
include ('config.php');

$login_button ='';
if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token']= $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        //print_r ($data);
        if(!empty($data['name'])){
            $_SESSION['name']=$data['name'];
        }
        if(!empty($data['family_name'])){
            $_SESSION['user_last_name']= $data['name'];
        }
        if(!empty($data['email'])){
            $_SESSION['user_email_address']= $data['email'];
        }
        if(!empty($data['gender'])){
            $_SESSION['user_gender']=$data['gender'];
        }else{
            $_SESSION['user_gender']= "-";
        }
        if(!empty($data['picture'])){
            $_SESSION['user_image']=$data['picture'];
        }
    }
}
if(!isset($_SESSION['access_token'])){
    $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="Google.png" width="500px" height="110px" alt=""></a>';
}


?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Login Using Google Account</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='
    viewport'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

    <!-- CSS -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="panel panel-default">
    <?php
    if($login_button == '')
    {
        echo '<div class="panel-heading">Selamat Datang</div><div class="panel-body">';
        echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
        echo '<h3><b>Nama :</b> '.$_SESSION['name'].'</h3>';
        echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
        echo '<h3><b>Jenis Kelamin :</b> '.$_SESSION['user_gender'].'</h3>';
        echo '<h3><a href="logout.php">Logout</h3></div>';
    }
    else
    {
        echo '<div align="center">'.$login_button . '</div>';
    }
    ?>
    </div>
</div>
</body>
</html>