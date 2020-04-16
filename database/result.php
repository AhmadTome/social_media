<?php
session_start();
$servername = "localhost";
$username = "social_media";
$password = "";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, "root", $password, $username, "3306");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");


$queryid = "select * from  `user` where email = '" . $_SESSION['user_email'] . "'";
$resultid = $conn->query($queryid);
$user_id = "";
if ($resultid->num_rows > 0) {
    $row = $resultid->fetch_assoc();
    $user_id = $row["id"];
}

$search_txt = $_GET['val'];

$query = "SELECT post.id as post_id,post.type as post_type, post.txt,post.created_at,user.id as user_id, user.name,user.img, post.type as type , post.filepath FROM `post`
  inner join user  ON post.user_id = user.id where user.id in (select friends.user_id2 from friends
   where friends.status=1)  
   or  user.id in (select friends.user_id1 from friends where friends.status=1)
    or user.id = '. $user_id .' and post.txt = '. $search_txt .' ORDER by post.id desc ";


$result = $conn->query($query);

if ($result->num_rows > 0) {
    $post = [];
    while ($row = $result->fetch_assoc()) {
        array_push($post, ["post_id" => $row["post_id"], "txt" => $row["txt"], "created_at" => $row["created_at"], "user_id" => $row["user_id"], "name" => $row["name"], "img" => $row["img"], "type" => $row["type"], "filepath" => $row["filepath"],]);
    }

    $post = json_decode(json_encode($post), true);
    echo json_encode($post);
}
