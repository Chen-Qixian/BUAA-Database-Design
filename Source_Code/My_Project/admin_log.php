<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<style>
		.websitetitle {
            background-image :url(./home1.jpg);
            color:white;
            margin:20px;
            padding:20px;
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
	<h2>DeepLearning.AI Administrator Log In</h2>
</div> 

<div class="login">
	<center>
		<h3>Admin log in</h3>
		<form action="admin_check.php" method="post">
		admin: <input type="text" name="adminname">
		<br>
		pword: <input type="text" name="adminpw">
		<br>
		<input type="submit" name="submit" value="Login">
		</form>
		<p align="right" > <a href="login.php">click here</a> to return to user log page </p>
	<center>
</div> 


</body>
</html>
