<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<title>Friend List</title>
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
            <div class="panel-heading text-center">Friend List</div>
            <div class="panel-body">

                <div style="max-width: 1000px ;margin-bottom: -15px">

                    <form method="post" action="database/edit_person_info.php" enctype="multipart/form-data">

                        <div class="w3-row-padding" style="margin-top: 30px;">
                            <div class="w3-col m12">
                                <div class="w3-card w3-round w3-white">
                                    <div class="w3-container w3-padding">
                                        <h3>List Of Friends</h3>

                                        <?php

                                        $users = getUsers();


                                        echo'<table class="table table-striped">
                                <thead >
                                    <th>User Name </th>
                                    <th style="text-align: right"> Status </th>
                                </thead>

                                <tbody>';

                                        for($i=0;$i<count($users);$i++){
                                            if($users[$i]["id"] != $users[$i]["my_user_id"] && $users[$i]["status"] != "1"){

                                                if($users[$i]["status"] == "0"){
                                                    echo '<tr>
                                                <td>'. $users[$i]["name"] .'</td>
                                                <td><button type="button" class="btn btn-success pull-right send-request" style="background-color: blue" data-id="'. $users[$i]["id"] .'">Sent</button></td>
                                                </tr>';
                                                }else{
                                                    echo '<tr>
                                                <td>'. $users[$i]["name"] .'</td>
                                                <td><button type="button" class="btn btn-success pull-right send-request" data-id="'. $users[$i]["id"] .'">Send Request</button></td>
                                                </tr>';
                                                }

                                            }
                                        }
                                        echo ' </tbody></table>';

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

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

    $(document).ready(function () {

        $(".send-request").on("click",function () {
            var id = $(this).attr('data-id');
            $(this).text('Sent');
            $(this).css({backgroundColor: 'blue'})

            $.ajax({
                url: "database/FriendSendRequest.php",
                type: "post",
                data: {"id": id},
                success: function (response) {
                    $(this).text('Sent');
                    $(this).style('backgroundColor','blue')
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
function getUsers(){
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


    $query = "select user.* , friends.status from  `user` left join friends on user.id = friends.user_id2  "  ;

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $info = [];
        while ($row = $result->fetch_assoc()) {
            array_push($info, ["id" => $row["id"], "name" => $row["name"], "img" => $row["img"], "status" => $row["status"], "my_user_id" => $user_id]);
        }
        return $info;
    } else {
        return [];
    }
}
?>
