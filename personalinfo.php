<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<title>المعلومات الشخصية</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html, body, h1, h2, h3, h4, h5 {
        font-family: "Open Sans", sans-serif
    }

    input{
        text-align: left;
    }
</style>
<body class="w3-theme-l5">

<?php

include ('navbar.html');

?>



<div class="w3-container w3-content" style="max-width:1400px;margin-top:150px" dir="ltr">


    <div class="col-lg-offset-2 col-lg-8 col-md-12 col-xs-12 col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Personal Information</div>
            <div class="panel-body">

                <div style="max-width: 1000px ;margin-bottom: -15px">
                    <p class="text-center" style="color: green; font-size: 18px;">
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo $_SESSION['success'];

                            unset($_SESSION['success']);

                        }
                        ?>
                    </p>
                    <form method="post" action="database/edit_person_info.php" enctype="multipart/form-data">

                        <div class="form-group row" dir="rtl">
                            <label class="control-label col-sm-2 pull-left text-left"> Name  </label>
                            <div class="col-sm-8 pull-left">
                                <input type="text" class="form-control" id="address" placeholder="ادخل الاسم" name="name"
                                       value="<?php echo getdata("name") ?>">
                            </div>
                        </div>

                        <div class="form-group row" dir="rtl">
                            <label class="control-label col-sm-2 pull-left text-left"> University </label>
                            <div class="col-sm-8 pull-left">
                                <input type="text" class="form-control" id="address" placeholder="ادخل اسم الجامعة"
                                       name="university" value="<?php echo getdata("university") ?>">
                            </div>
                        </div>

                        <div class="form-group row" dir="rtl">
                            <label class="control-label col-sm-2 pull-left text-left"> Major</label>
                            <div class="col-sm-8 pull-left">
                                <input type="text" class="form-control" id="address" placeholder="ادخل التخصص" name="major"
                                       value="<?php echo getdata("major") ?>">                            </div>
                        </div>

                        <div class="form-group row" dir="rtl">
                            <label class="control-label col-sm-2 pull-left text-left">Birth Date </label>
                            <div class="col-sm-8 pull-left">
                                <input type="text" class="form-control text-left" id="age" name="age"
                                       value="<?php echo getdata("age") ?>">                            </div>
                        </div>

                        <div class="form-group row" dir="rtl">
                            <label class="control-label col-sm-2 pull-left text-left">Change profile picture </label>
                            <div class="col-sm-8 pull-left">
                                <input type="file" class="form-control text-right" id="fileToUpload" name="fileToUpload">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary pull-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                <br>

                <!-- Footer -->
                <footer class="w3-container w3-theme-d3 w3-padding-16" style="position: absolute;left: 0;bottom: 0;left: 0;padding: 1rem;background-color: #efefef;text-align: center;">
                    <h5 style="text-align: center">Footer</h5>
                </footer>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
    $query = "SELECT * FROM `user` where email = '" . $_SESSION['user_email'] . "'";
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
        return "";
    }
    return "";
}

?>
