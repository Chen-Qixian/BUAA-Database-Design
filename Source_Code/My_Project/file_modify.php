<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .websitetitle {
            /*background-color:CornflowerBlue;*/
            background-image :url(./home1.jpg);
            color:white;
            margin:20px;
            padding:20px;
        }
        .websitesubtitle {
            background-color:#003366;
            color:#FFCC99;
            margin:20px;
            padding:20px;
        }
        .name {
            background-color:#000033;
            color:#CCFFCC;
            margin:20px;
            padding:3px;

        } 
        .login {
            background-color:#003333;
            color:#FFFFCC;
            margin:20px;
            padding:20px;
        } 
        a:link {color:#FF0000;}    /* 未被访问的链接 */
        a:visited {color:#00FF00;} /* 已被访问的链接 */
        a:hover {color:#FF00FF;}   /* 鼠标指针移动到链接上 */
        a:active {color:#0000FF;}  /* 正在被点击的链接 */ 
    </style>
</head>

<body>

<div class="websitetitle">
    <h2>DeepLearning.AI</h2>
    <h4>
        "Deep Learning is a superpower. With it you can make a computer see, synthesize novel art, translate languages, render a medical diagnosis, or build pieces of a car that can drive itself. If that is not a superpower, I do not know what is."         
    </h4>
    <div style="float:right; text-align:right"> --Andrew Ng</div>
</div> 

<?php
    session_start();
    $n = $_SESSION['name'];
    if(isset($_POST["submit"]))
    {

        $usernickname = $_POST["usrnickname"];
        $userpsw1 = $_POST["usrpw1"];
        $userpsw2 = $_POST["usrpw2"];
        $useremail = $_POST["usremail"];
        $userphone = $_POST["usrphone"];

        if($usernickname == "" || $userpsw1 == "" ||$userpsw2 == "" ||$useremail == "" ||$userphone == "")
        {
            echo "<script>alert('Null is not acceptable!'); history.go(-1);</script>";
        }
        else
        {
            $connect = mysqli_connect('localhost','root','');
            if (!$connect){
                 echo"<script>alert('Unable to connect to database！')</script>";
            }
            mysqli_select_db($connect , "deeplearning");
            $sql0 = "SELECT * FROM user_list WHERE username LIKE '$n'";
            $result0 = mysqli_query($connect , $sql0);
            $num0 = mysqli_num_rows($result0);
            if($num0 == 0){
                echo "user name doesn't exist.";
            }
            else if($userpsw1 != $userpsw2){
                echo "<script>alert('password confirmation failed!'); history.go(-1);</script>";
            }
            else{
                $sql = "UPDATE user_list SET tel = '$userphone', password = '$userpsw1', realname ='$usernickname', email = '$useremail' WHERE user_list.username = '$n'";
                $result = mysqli_query($connect , $sql);
                echo "<script>alert('Modification Succeed！'); </script>";
            }
        }
    }
?> 

<p align=center> <a href="./main.php">Home Page</p>
