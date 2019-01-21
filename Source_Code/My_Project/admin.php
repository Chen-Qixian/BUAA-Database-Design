<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
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
	<h2>DeepLearning.AI Administrator Management</h2>
</div> 

<div class="login">

	<center>
		<h3> Maintain Database With SQL </h3>

		<form action="./admin_result.php" method="post">

		<textarea rows="10" cols="100" name="item"> </textarea>
		</br>
		<input type="submit" name="submit" value="do it!">

		</form>
		<p align="right" > <a href="admin_log.php">return to admin log in</a> </p>
		<p align="right" > <a href="main.php">return to home page</a> </p>
	</center>

</div>


