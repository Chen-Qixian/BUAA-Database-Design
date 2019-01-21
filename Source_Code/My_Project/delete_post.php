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
        $id = $_POST['postid'];
	    $connect = mysqli_connect('localhost','root','');
        if (!$connect){
            echo"<script>alert('Unable to connect to database！')</script>";
        }
        mysqli_select_db($connect , "deeplearning");
        mysqli_query($connect , "set names utf8");
        session_start(); 
	    $name = $_SESSION['name'];
        //$id = $_SESSION['current_delete_post_id'];
        $sql = "SELECT * FROM user_list WHERE username = '$name'";
	    $result2 = mysqli_query($connect , $sql);
    	$arr2 = array();
    	$arr2 = mysqli_fetch_array($result2);
        //var_dump($arr2);
    	$user_name = $arr2['username'];
	    //$sql = "select * from user_list where user_name ='$user' and pwd ='$psw' ";
        //echo $user_name;
        //echo $id;    
	    $sql = " DELETE FROM posts WHERE user = '$user_name' and post_id = '$id'";
	    //echo $sql;
	    $result = mysqli_query($connect , $sql);
        //$num = mysql_num_rows($result);
    ?> 



<div class="login"> 
    <center>
    <h2>Post Has Deleted!</h2> 
    Return to previous page automatically within 2 seconds.
    </p>  
    <?php header("refresh:2;url=forum.php");  ?>
</div>

