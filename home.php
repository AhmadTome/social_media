<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
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
        right: 0;
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
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-left-align w3-large" style="background-color: #299498">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2"
           href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large ">
            <img src="assets/images/logo.jfif" class="w3-circle" style="width: 43px;height: 33px;" alt="Avatar">
        </a>

        <a href="#" class="w3-bar-item w3-hide-small w3-padding-large "  title="search">
            <input type="text" value="Search" placeholder="Search ..." style="padding-left: 2px; width: 350px;"> <i
                    class="fa fa-search"></i>
        </a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"
           title="Account Settings"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i
                    class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white"
           title="My Account">
            <img src="assets/images/default-user.png" class="w3-circle" style="height:23px;width:23px" alt="profile">
        </a>
    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large" style="margin-bottom: 20px; ">
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="margin-top: 57px;text-align: right">
        حسابي
        <img src="assets/images/default-user.png" class="w3-circle" width="25" height="25" alt="profile">
    </a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: right">الأصدقاء</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: right">رسائلي الخاصة</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large" style="text-align: right">القروبات</a>

</div>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <div class="simple-marquee-container">

        <div class="marquee">
            <ul class="marquee-content-items">
                <li>My edu reference اهلا وسهلا بكم في موقع وشبكة تواصل  </li>

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
                    <div class="w3-container" dir="rtl">
                        <h4 class="w3-right">الأصدقاء</h4><br>
                        <hr>
                        <ul>
                            <li>
                                احمد
                            </li>
                            <li>
                                سندس
                            </li>
                            <li>
                                افنان
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m7">

            <div class="w3-row-padding">
                <div class="w3-col m12">
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <h6 class="w3-opacity" style="text-align: right" >انشر منشوراتك على شبكة التواصل</h6>
                            <p contenteditable="true" class="w3-border w3-padding" style="text-align: right">... اكتب بماذا تفكر </p>
                            <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  نشر </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w3-row-padding" style="margin: 5px;">
                <div class="w3-col m12">
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container w3-padding">
                            <label class="pull-right" style="font-size: 18px; margin: 3px;"> منشورات عامة</label>
                            <label class="switch pull-right">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>

            <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <img src="assets/images/default-user.png" alt="Avatar" class="w3-right w3-circle w3-margin-left"
                     style="width:42px">
                <span class="w3-left w3-opacity">1 min</span>
                <h4 class="pull-right">محمد سليمات</h4><br>
                <hr class="w3-clear">
                <p style="text-align: right">اريد شراء كتاب جافا </p>

                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>
                     Like
                </button>
                <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>
                     Comment
                </button>
            </div>


        </div>

        <!-- Right Column -->
        <div class="w3-col m2">
            <div class="w3-card w3-round w3-white w3-center">
                <div class="w3-container">
                    <h4 class="w3-center">الصفحة الشخصية</h4>
                    <p class="w3-center"><img src="assets/images/default-user.png" class="w3-circle"
                                              style="height:106px;width:106px" alt="Avatar"></p>
                    <hr>
                    <div dir="rtl" class="pull-right">
                        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
                    </div>
                </div>
            </div>
            <br>

            <div class="w3-card w3-round " dir="rtl" >
                <div class="w3-white " >
                    <button class="w3-button w3-block w3-theme-l1 w3-right-align"><i
                                class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> القروبات
                    </button>

                    <button class="w3-button w3-block w3-theme-l1 w3-right-align"><i
                                class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> الفعاليات والأنشطة
                    </button>

                    <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-right-align"><i
                                class="fa fa-users fa-fw w3-margin-right"></i> الصور
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



            <!-- End Right Column -->
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
    <h5 style="text-align: center"> تكرماً ساهم في نشر الموقع ليستفيد الجميع منه
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
