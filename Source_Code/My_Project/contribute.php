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
    <h1>Contribution</h1>
    <h4>
        "Share your resources and make contributions for DeepLearning.AI society!"         
    </h4>
</div>

<div class="login">
<center>
	<div style="float:right; text-align:right">
		<p><a href="./main.php">Home Page</a></p>
	</div>
	</br>
	</br>
	<h2><font color = "#FFFF00">Contribute Here!</font></h2>
</center>
<hr />
<center>

	<h3><font color = "#FFFF00">Fill the information below & Make contributions !</font></h3>
	<p> *Notice : category must be exist already!</p>
	<div id="b">
		<form action="./add_source.php" method="post">

			title : <input type="text" class="a" name="title">
			</br>
			author: <input type="text" class="a" name="author">
			</br>
			date  : <input type="text" class="a" name="date">
			</br>
			category: <input type="text" class="a" name="category">
			</br>
			abstract: <input type="text" class="a" name="abstract">
			</br>
			link: <input type="text" class="a" name="link">
			</br>

			<center>
				</br>
				<input type="submit" name="submit" value="Contribute!">
			</center>
		</form>
	</div>
</center>

