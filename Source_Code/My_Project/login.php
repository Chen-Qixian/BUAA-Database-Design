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
        .websitesubtitle {
            background-color:#000033;
            color:#CCFFCC;
            margin:20px;
            padding:20px;
        }
        .name {
            background-color:#33EEFF;
            color:black;
            margin:0px;
            padding:0px;

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

		<div class="websitesubtitle">
		    <h2>User Log In</h2>
		    <h4>
		        "Break into AI! Right Now!"         
		    </h4>
		</div>
		<div class="login">
			<p align="right" ><a href="main.php"> Home page </a> </p>
			<center>
				<h1>Break into AI</h1>
				<h4>
					Whether you want to build algorithms or build a company, resources from DeepLearning.AI will teach you key concepts and applications of AI.
				</h4>
				<form action="./log_check.php" method="post">
					user name: <input type="text" name="usrname">
					<br>
					password : <input type="text" name="usrpw">
					<br>
					<input type="submit" name="submit" value="Login">
				</form>

				<p>
					If you are not a member of DeepLearning.AI <a href="./register.php">click here</a> to join us!
				</br>
				</br>
				</p>

				<p align="right" ><a href="admin_log.php"> Administrator entrance</a> </p>

			<center>
		</div> 


	</body>
</html>
