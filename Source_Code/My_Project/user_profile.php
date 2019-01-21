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
		.a{
		    width: 300px;
		    height: 30px;
		}
		 #b{
		    width: 400px;
		    text-align: right;·
		} 
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
<div class="websitesubtitle">
    <h1>User Profile</h1>
    
</div>
<div class="login">
<center>
	<div style="float:right; text-align:right">
		<p><a href="./main.php">Home Page</a></p>
	</div>
	</br>
	</br>
	<h2><font color = "#FFFF00">Personal Profile</font></h2>

	<?php
	    $connect = mysqli_connect('localhost','root','');
	    if (!$connect){
	        echo"<script>alert('Unable to connect to database！')</script>";
	    }
	    mysqli_select_db($connect , "deeplearning");
	    session_start();
	    $username = $_SESSION['name'];
	    $sql = "select * from user_list where username ='$username'";
	    $result = mysqli_query($connect , $sql);
	    $arr = array();
	    while($rs = mysqli_fetch_assoc($result)){ $arr[]=$rs;  }
	?>
	<font color = "FF6600">User Name:</font>
	<?php print($arr[0]['username']); ?>
	</br>
	<font color = "FF6600">Real Name:</font>
	<?php print($arr[0]['realname']);   ?>
	</br>
	<font color = "FF6600">Telphone :</font>
	<?php print($arr[0]['tel']);   ?>
	</br>
	<font color = "FF6600">e-mail   :</font>
	<?php print($arr[0]['email']);   ?>
	</br>
</center>
<hr />
<center><h2><font color = "#FFFF00">Profile Modification</font></h2></center>
<center>
	<p> Modify your personal profile here</p>
	<p> * User name cannot be modified! </p>

	<div id="b">
		<form action="./file_modify.php" method="post">

			real name: <input type="text" class="a" name="usrnickname">
			<br>
			password : <input type="text" class="a" name="usrpw1">
			<br>
			confirm  : <input type="text" class="a" name="usrpw2">
			<br>
			e-mail: <input type="text" class="a" name="usremail">
			<br>
			Tel: <input type="text" class="a" name="usrphone">
			<br>

			<center>
				</br>
				<input type="submit" name="submit" value="Modify!">
			</center>
		</form>
	</div>
</center>

