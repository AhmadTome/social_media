<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}

$servername = "localhost";
$username = "social_media";
$password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root",$password, $username,"3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$user_email = $_SESSION['user_email'];

$query = "select id from  `user` where email = '".$user_email."'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row["id"];
}
else {
    echo "no user";
    header('Location: ../sign_in.php');
}


$to = $_REQUEST['to_id'];
$txt = $_REQUEST['txt'];
$from = $user_id;
$date = date('Y-m-d H:i:s');


$query2 = "INSERT INTO messages(`created_at`, `from_id`, `to_id`, `txt`) VALUES('$date', '$user_id', '$to', '$txt')";

$result2 = mysqli_query($conn,$query2);

if($result2) {
    echo "done";
}
else {
    echo "Failed to register";
}
