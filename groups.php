<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<title>Groups Page</title>
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


        <!-- Middle Column -->
        <div class="w3-col m7">

            <form name="postForm" action="database/addgroup.php" method="post" accept-charset="utf-8">
                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <h3>Add New Group</h3>

                                <div class="form-group row" dir="rtl">
                                    <label class="control-label col-sm-3 pull-left text-left"> Group Name</label>
                                    <div class="col-sm-8 pull-left">
                                        <input type="text" class="form-control" id="name" placeholder=" ... Enter group name" name="name" style="text-align: left"
                                               >                            </div>
                                </div>

                                <div class="form-group row" dir="rtl">
                                    <label class="control-label col-sm-3 pull-left text-left"> Group Description</label>
                                    <div class="col-sm-8 pull-left">
                                        <input type="text" class="form-control" id="desc" placeholder=" ... Enter group description" name="desc"
                                               style="text-align: left">                            </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Add</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="w3-row-padding" style="margin-top: 30px;">
                <div class="w3-col m12">
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <h3>List Of Groups</h3>

                            <?php

                                $groups = getGroups();

                                $id = getId();


                            echo'<table class="table table-striped">
                                <thead >
                                    <th>Group Name </th>
                                    <th>Group Description </th>
                                    <th style="text-align: right"> Status </th>
                                </thead>

                                <tbody>';

                            for($i=0;$i<count($groups);$i++){
                                if($groups[$i]["user_id"] != $id){

                                echo '<tr>
                                        <td>'. $groups[$i]["name"] .'</td>
                                        <td>'. $groups[$i]["description"] .'</td>
                                        <td><button type="submit" class="btn btn-success pull-right join-group" data-id="'. $groups[$i]["group_id"] .'">Join</button></td>
                                    </tr>';

                                }
                            }
                               echo ' </tbody></table>';

                            ?>

                        </div>
                    </div>
                </div>
            </div>






        </div>

        <!-- left Column -->
        <div class="w3-col m3 pull-right">
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
                    <button class="w3-button w3-block -l1 w3-left-align"><i
                            class="fa fa-circle-o-notch fa-fw w3-margin-left"></i> Groups
                    </button>

                    <button class="w3-button w3-block -l1 w3-left-align" onclick="window.location='EventAndActivity.php'"><i
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

        $(".join-group").on("click",function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url: "database/joinGroup.php",
                type: "post",
                data: {"id": id},
                success: function (response) {
                    location.reload()
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


function getGroups()
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
    } else {
        header('Location: ../sign_in.php');
    }


    $query = "SELECT group.id as group_id , group.name , group.description , group_user.user_id  FROM `group` left join group_user on group.id = group_user.group_id "  ;
    //$query = "select messages.id as msg_id,messages.created_at,messages.txt,user.* from messages inner join user on messages.to_id = user.id where messages.from_id = " . $user_id . " GROUP by messages.to_id ORDER BY created_at desc";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["group_id" => $row["group_id"], "name" => $row["name"], "description" => $row["description"], "user_id" => $row["user_id"]]);
        }
        return $info;
    } else {
        return [];
    }
}

function getId(){
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
    } else {
        header('Location: ../sign_in.php');
    }
return $user_id;
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
