<?php
setcookie("ip", "", time() - 3600);

echo "<script type='text/javascript'>document.write(screen.width+'x'+screen.height); </script>";
?>
<html>
<head>
  <title>control panel</title>
</head>
<body>
  <a href="../index.php">terug</a>
  <br>
<?php
$servername = "localhost";
$username = "u17313p12799_floris";
$password = "Floris09";
$dbname = "u17313p12799_stats";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["browser"] == "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36"){
          $b = "chrome";
        }elseif ($row["browser"] == "Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_2 like Mac OS X) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.0 Mobile/14F89 Safari/602.1") {
          $b = "safari";
        } else{
          $b = $row["browser"];
        }
        echo "id: " . $row["id"]. " - cookie id: " . $row["cookie"]. " - ip: " . $row["ip"]. " - browser: " . $b. " - datum: " . $row["reg_date"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "Cookie 'user' is deleted.";
?>
</body>
</html>
