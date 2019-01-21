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
        //echo $_SESSION['current_post_id'];
        $post = $_SESSION['current_post_id'];
        if(isset($_POST["submit"])) {
            $comment=$_POST["comment"];
            $con = mysqli_connect('localhost','root','');
            if(!$con){
                echo "<script>alert('Unable to connect to database'); history.go(-1);</script>";
            }
            mysqli_select_db($con , "deeplearning");
            mysqli_query($con , "set names utf8");
            $sql2 = mysqli_query($con , "select * from user_list where username = '$n'");
            $row = mysqli_fetch_array($sql2);
            $u_id = $row['user_id'];
            $time = time();
            //echo $post;
            //echo $time;
            //echo $u_id;
            //echo $comment;
	        $sql = "INSERT INTO posts_info (post_id, respond_id, respond_time, user_id, respond_msg) VALUES ('$post', NULL, '$time', '$u_id', '$comment')";
            $result = mysqli_query($con , $sql);
            //var_dump($result);
        }
        else{
            echo "Comment Error";
        }
?>

<div class="login"> 
<center>
    <h2>Comment Success！</h2> 
    <p>
    Return to previous page automatically within 2 seconds.
    </p>  
    <?php header("refresh:2;url=post_detail.php?post_id=$post");  ?>
</div>
