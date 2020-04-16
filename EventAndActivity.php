<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<title>Event & Activity Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/stylesheets/example.css">
<link rel="stylesheet" href="assets/stylesheets/marquee.css">


<style>
    html, body, h1, h2, h3, h4, h5 {
        font-family: "Open Sans", sans-serif
    }
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        left: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    .faf {
        padding: 9px;
        font-size: 30px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-whatsapp {
        background: #66dd1d;
        color: white;
    }

    button{
        background-color: #6FAFB9 !important;
    }
</style>
<body class="-l5">

<?php

include ('navbar.html');

?>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block -d2 w3-hide w3-hide-large w3-hide-medium w3-large" style="margin-bottom: 20px; ">
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="margin-top: 57px;text-align: left">
        حسابي
        <img src="assets/images/default-user.png" class="w3-circle" width="25" height="25" alt="profile">
    </a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: left">Friends</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: left">messages</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: left">Groups</a>

</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
            <!-- Profile -->

            <!-- Alert Box -->
            <div class="w3-container w3-display-container w3-round w3-margin-bottom w3-hide-small">
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container" dir="ltr">
                        <h4 class="w3-left">Friends</h4><br>
                        <hr>
                        <ul>
                            <li>
                                Ahmad
                            </li>
                            <li>
                                Sondus
                            </li>
                            <li>
                                Afnan
                            </li>
                            <li>
                                Ahlam
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m7">

            <form name="postForm" action="database/addpost.php" method="post" accept-charset="utf-8">
                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <h6 class="w3-opacity" style="text-align: left" >Share posts on the social media network</h6>
                                <textarea contenteditable="true" rows="5" class="form-control w3-border w3-padding" id="post_txt" name="post_txt" style="width: 100%;text-align: left" data-placeholder="Your Status ..."> </textarea>
                                <div class="row col-sm-4">
                                    <label for="sel1">Post Type:</label>
                                    <select class="form-control" id="post_type" name="post_type">
                                        <option value="News">News</option>
                                        <option value="Questions">Questions</option>
                                        <option value="Volunteer">Volunteer</option>
                                        <option value="Activity">Activity</option>
                                        <option value="Event">Event</option>
                                        <option value="Training">Training</option>
                                        <option value="Announcement">Announcement</option>
                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <p class="text-right pull-right" style="color: green;font-size: 20px;">
                                    <?php
                                    if (isset($_SESSION['post_added'])) {
                                        echo $_SESSION['post_added'];

                                        unset($_SESSION['post_added']);

                                    }
                                    ?>
                                </p>
                                <button type="submit" id="btn" class="w3-button w3-theme" style="margin-top: 10px;"><i
                                        class="fa fa-pencil"></i>
                                     Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <div class="w3-row-padding" style="margin: 5px;">
                <div class="w3-col m12">
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <label class="pull-left" style="font-size: 18px; margin: 3px;"> Public Post</label>
                            <label class="switch pull-left">
                                <input type="checkbox" checked>
                                <span class="slider round" style="min-width: 60px;"></span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title pull-left">send message </h4>
                        </div>
                        <div class="modal-body">
                                <textarea id="txtMSG" name="txtMSG" class="form-control text-right" style="width: 100%"
                                          rows="5"></textarea>
                        </div>
                        <div class="modal-footer text-left">
                            <p class="text-right" id="successMSG" style="color: green;font-size: 20px;"></p>
                            <button type="button" class="btn btn-danger pull-left" id="closeModal"
                                    data-dismiss="modal">cancle
                            </button>
                            <button type="button" class="btn btn-primary pull-left" id="sendMSG">send</button>
                        </div>
                    </div>

                </div>
            </div>


            <?php
            $post = getposts();
            foreach ($post as $item) {
                if($item["type"] != "Announcement"){
                    echo '
             <div class="w3-container w3-card w3-white w3-round w3-margin" data-post="' . $item["post_id"] . '"><br>
                <img src="' . $item["img"] . '" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <span class="w3-right w3-opacity">' . $item["created_at"] . '</span>
                <h4>' . $item["name"] . '</h4><br>
                <span style="margin-right: 15px;color: #6FAFB9;font-weight: bold;" class="w3-right w3-opacity">' . $item["type"] . '*</span>
                <hr class="w3-clear">
                <p>' . $item["txt"] . '</p>
                
            
            ';
                    echo '<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom msg" data-toggle="modal" data-target="#myModal" data-ownerId="' . $item["user_id"] . '" >  send message <i class="fa fa-envelope"></i></button>';
                    echo '<div class="w3-row-padding">';
                    echo '<div class="w3-col m10 pull-right" style="padding-left: 43px;padding-bottom: 18px;">';
                    echo '<div class="w3-card w3-round w3-white">';
                    echo '<div class="w3-container w3-padding">';
                    echo ' <textarea placeholder="write comment ..." contenteditable="true" class="form-control w3-border w3-padding comment-text pull-right" rows="1" style="text-align: left; width: 100%; margin-left: 30px;" name="comment_text" required></textarea>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="w3-col m2 pull-right">';
                    echo '<button style="margin-top: 7px;" type="button" class="w3-button w3-theme-d2 w3-margin-bottom comment" >  comment <i class="fa fa-comment"></i></button>';
                    echo '</div>';
                    echo '</div>';
                    $comment = getComments ();
                    foreach ($comment as $item2) {
                        if($item2["post_id"] == $item["post_id"]){
                            echo '<div class="col-sm-12 cmnt" >';
                            echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading text-right" style="height: 41px;">';
                            //echo '<span class="glyphicon glyphicon-remove delete-comment pull-left" data-id="'. $item2['comment_id'] .'">&nbsp;</span>';
                            //echo '<span class="glyphicon glyphicon-edit edit-comment pull-left" data-id="'. $item2['comment_id'] .'" data-content="'. $item2['txt'] .'"> &nbsp;</span>';
                            echo '<span class="text-muted pull-right">'. $item2['created_at'] .'</span>';
                            echo '<strong class="text-muted pull-left">'. $item2['name'] .' </strong>';
                            echo '<span class="text-muted pull-left"><img  src="'. $item2['img'] .'" width="25" height="25" style="border-radius: 50%;"></span>';
                            echo '</div>';
                            echo '<div class="w3-container w3-padding">';
                            echo $item2['txt'];
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                        }
                    }
                    echo '</div>';
                }
            }




            ?>



        </div>

        <!-- left Column -->
        <div class="w3-col m2">
            <div class="w3-card w3-round w3-white w3-center">
                <div class="w3-container">
                    <h4 class="w3-center">Personal Page</h4>
                    <p class="w3-center"><img src="<?php echo getdata("img") ?>" class="w3-circle"
                                              style="height:106px;width:106px" alt="Avatar"></p>
                    <hr>
                    <div dir="ltr" class="pull-left" style="text-align: left">
                        <p><i class="fa fa-pencil fa-fw w3-margin-left w3-text-theme"></i> <?php echo getdata("major") ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-left w3-text-theme"></i> <?php echo getdata("university") ?></p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-left w3-text-theme"></i> <?php echo getdata("age") ?></p>
                    </div>
                </div>
            </div>
            <br>

            <div class="w3-card w3-round " dir="ltr" >
                <div class="w3-white " >
                    <button class="w3-button w3-block -l1 w3-left-align" onclick="window.location='groups.php'"><i
                                class="fa fa-circle-o-notch fa-fw w3-margin-left"></i> Groups
                    </button>

                    <button class="w3-button w3-block -l1 w3-left-align"><i
                            class="fa fa-calendar-check-o fa-fw w3-margin-left"></i>Event and Activity
                    </button>

                    <button onclick="myFunction('Demo3')" class="w3-button w3-block -l1 w3-left-align"><i
                            class="fa fa-users fa-fw w3-margin-left"></i> Photos
                    </button>
                    <div id="Demo3" class="w3-hide w3-container">
                        <div class="w3-row-padding">

                            <?php

                            $imgs = getPhotos();
                            for ($i = 0; $i < 6; $i++) {
                                if ($i < count($imgs) ) {
                                    echo '<br>
                                            <div class="w3-half">
                                                <img src='. $imgs[$i]["img"] .' style="width:100%; height: 75px" class="w3-margin-bottom">
                                            </div>';
                                }else{
                                    echo '<br>
                                            <div class="w3-half">
                                                <img src="assets/images/default-user.png" style="width:100%; height: 75px" class="w3-margin-bottom">
                                            </div>';
                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <br>



            <!-- End left Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-padding-16" style="background-color: grey; color: white;">
    <h5 style="text-align: center"> My edu reference </h5>
    <h3 style="text-align: center">
        <a href="#" class="fa fa-facebook faf"></a>
        <a href="#" class="fa fa-twitter faf"></a>
        <a href="#" class="fa fa-whatsapp faf"></a>
    </h3>
    <h5 style="text-align: center">Please share the website on social media
    </h5>

</footer>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="assets/javascripts/marquee.js"></script>

<script>
    var to_msg = "";
    // Accordion
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-theme-d1";
        } else {
            x.className = x.className.replace("w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-theme-d1", "");
        }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    $(function (){

        $('.simple-marquee-container').SimpleMarquee();

    });


    $(document).ready(function () {
        $('.comment').on("click", function (event) {
            var btn = event.target;
            var ele = btn.closest(".w3-container.w3-card.w3-white.w3-round.w3-margin");
            var text_content = ele.getElementsByClassName('comment-text')[0];
            var post_id = ele.getAttribute("data-post");



            if(text_content.value == ""){
                alert("يجب إدخال نص للتعليق!");
                return false;
            }else{
                console.log(text_content.value)
                console.log(post_id)
                $.ajax({
                    url: "database/addComment.php",
                    type: "get",
                    data: {"txt": text_content.value, "post_id": post_id},
                    success: function (data) {
                        console.log(data)

                        data = JSON.parse(data)
                        console.log(data)
                        location.reload();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });

            }

        });

        $('.msg').on("click", function () {
            to_msg = $(this).attr('data-ownerId');
            //alert(to_msg)
        });

        $('#sendMSG').on("click", function () {
            var txtMSG = $("#txtMSG").val();
            // alert(to_msg)
            // alert(txtMSG)

            $.ajax({
                url: "database/sendMSG.php",
                type: "post",
                data: {"txt": txtMSG, "to": to_msg},
                success: function (response) {
                    console.log(response)
                    $("#successMSG").text("The message sent successfully")
                    setTimeout(function () {
                        $("#successMSG").text("")
                        $("#txtMSG").val("")
                        $("#closeModal").click();
                    }, 2000);


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });
        })
    })
</script>

</body>
</html>

<?php
function getdata($input)
{
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
    $query = "select * from  `user` where email = '" . $_SESSION['user_email'] . "'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $user_img = $row["img"];
        $user_age = $row["age"];
        $user_name = $row["name"];
        $major = $row["major"];
        $university = $row["university"];
        if ($input == "age")
            return $user_age;
        if ($input == "img")
            return $user_img;
        if ($input == "name")
            return $user_name;
        if ($input == "id")
            return $user_id;
        if ($input == "major")
            return $major;
        if ($input == "university")
            return $university;
    } else {
        header('Location: ../sign_in.php');
    }
    return "";
}



function getposts()
{
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
    $query = "SELECT post.id as post_id,post.type as post_type, post.txt,post.created_at,user.id as user_id, user.name,user.img, post.type as type FROM `post`  inner join user  ON post.user_id = user.id where post.type = 'Event' or post.type = 'Activity' ORDER by post.id desc ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $post = [];
        while ($row = $result->fetch_assoc()) {
            array_push($post, ["post_id" => $row["post_id"], "txt" => $row["txt"], "created_at" => $row["created_at"], "user_id" => $row["user_id"], "name" => $row["name"], "img" => $row["img"], "type" => $row["type"],]);
        }
        return $post;
    }
}


function getComments (){
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
    $query = "SELECT comments.id as comment_id, user.id as user_id , comments.* , user.* FROM `comments` left join user on comments.user_id = user.id;";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $comment = [];
        while ($row = $result->fetch_assoc()) {
            array_push($comment, ["comment_id" => $row["comment_id"], "user_id" => $row["user_id"], "created_at" => $row["created_at"], "post_id" => $row["post_id"], "name" => $row["name"], "img" => $row["img"],"txt" => $row["txt"]]);
        }
        return $comment;
    } else {
        return [];
        header('Location: ../sign_in.php');
    }
}

function getPhotos()
{
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

    $query = "SELECT * FROM `photos_user` WHERE `user_id`= " . $user_id;
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $imgs = [];
        while ($row = $result->fetch_assoc()) {
            array_push($imgs, ["img" => $row["img_path"]]);
        }
        return $imgs;
    } else {
        return [];
    }
}

?>
