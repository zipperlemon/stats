<?php
  $servername = "localhost";
  $username = "u17313p12799_floris";
  $password = "Floris09";
  $dbname = "u17313p12799_stats";


  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  function getRealUserIp(){
   switch(true){
     case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
     case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
     case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
     default : return $_SERVER['REMOTE_ADDR'];
   }
}



$cookie_name = "ip";
  $ip = getRealUserIp();
  $cookie_value = $ip;
  $browser = $_SERVER['HTTP_USER_AGENT'];
  if(isset($_SERVER['HTTP_REFERER'])) {
    $reffer = $_SERVER['HTTP_REFERER'];
 }else{
   $reffer = "geen";
 }



 //if(!isset($_COOKIE[$cookie_name])) {
  //    echo "Cookie named '" . $cookie_name . "' is not set!";
 //}
 if(!isset($_COOKIE[$cookie_name])) {
   $sql1 = "INSERT INTO info (cookie, ip, browser)
   VALUES ('$cookie_value', '$ip', '$browser')";
   setcookie($cookie_name, $cookie_value, time() + (86400 * 365 * 9), "/");
 } else {
   echo "hi";
}




  $sql = "INSERT INTO refs (ip, ref)
  VALUES ('$ip', '$reffer');";

  //if ($conn->query($sql1) === TRUE) {
//    $last_id = $conn->insert_id;
//    echo "New record created successfully. Last inserted ID is: " . $last_id;
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}


  $conn->close();
?>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Stats Demo</h1>
    <p><a href="cpanel/">Click to Login</a></p>
    <p><B><I>Still in beta!!!!!!</I></B></p>
    <p>This page is being used to gether info.</p>
    <?php echo $_SERVER['HTTP_REFERER']; ?>
    </div>
</body>
</html>
