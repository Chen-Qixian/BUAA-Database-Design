<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
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

<div class="login">
	<center>
		<h2>Register Succeed！</h2>
		<h3>
		Log in & Break Into AI Right Now!
		</h3>
		</br>
		<h3>
		Return to login page automatically with in 3 seconds.
		</h3>
		<?php header("refresh:3;url=login.php");  ?>
</div>

