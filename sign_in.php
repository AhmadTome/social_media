<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Sign in Form with Social Login Buttons</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .login-form {
            width: 500px;
            margin: 30px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .login-form .hint-text {
            color: #777;
            padding-bottom: 15px;
            text-align: center;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn{
            background-color: #6FAFB9 !important;
        }

        .login-btn {
            font-size: 15px;
            font-weight: bold;
        }

        .or-seperator {
            margin: 20px 0 10px;
            text-align: center;
            border-top: 1px solid #ccc;
        }

        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }

        .social-btn .btn {
            margin: 10px 0;
            font-size: 15px;
            text-align: left;
            line-height: 24px;
        }

        .social-btn .btn i {
            float: left;
            margin: 4px 15px 0 5px;
            min-width: 15px;
        }

        .input-group-addon .fa {
            font-size: 18px;
        }
        .vl {
            border-left: 6px solid #6FAFB9;
            height: 353px;
            left: 50%;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="login-form" style="margin-top: 110px;">
    <form action="/examples/actions/confirmation.php" method="post" style="border-radius: 21%;height: 415px;">
        <div class="parent_class" style="width: 100%; height: 320px;">
            <span style="display: inline-block; width: 45%; background-color: grey">
            <div style="margin-top: -154px;margin-left: 91px;">
                <img src="assets/images/logo.jfif" style="border-radius: 50%; width: 150px;height: 150px; position: absolute; margin-top: -99px; margin-left: -70px;" >
            </div>
            </span>
            <span class="vl"></span>
            <span dir="rtl" class="pull-right" style="display: inline-block; width: 45%; height: 100%;margin-top: 100px ">

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="********" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block login-btn">تسجيل الدخول</button>
                </div>
            </span>
         </div>



    </form>
</div>
</body>
</html>
