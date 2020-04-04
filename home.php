<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<title>Home Page</title>
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

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;">
    <div class="simple-marquee-container">

        <div class="marquee">
            <ul class="marquee-content-items">
                <li>You are welcome to our site My edu reference   </li>


            </ul>
        </div>
    </div>
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
                                <div class="row">
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

            <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <img src="assets/images/default-user.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <span class="w3-right w3-opacity">16 min</span>
                <h4>Mohammad Imad</h4><br>
                <hr class="w3-clear">
                <p>I need Java book, if anyone can help me please inbox me</p>
                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> &nbsp;Like</button>
                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Comment</button>
            </div>


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
                    <button class="w3-button w3-block -l1 w3-left-align"><i
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
                            <br>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
                            <div class="w3-half">
                                <img src="assets/images/default-user.png" style="width:100%" class="w3-margin-bottom">
                            </div>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="assets/javascripts/marquee.js"></script>

<script>
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

?>
