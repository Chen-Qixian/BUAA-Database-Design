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

<div class="websitesubtitle">
    <h2>Add a Post</h2>
    <h4>
        "Always respect your fellows & Remember to keep your private information safe!"         
    </h4>
</div>

<div class="name">

    <div style="float:left; text-align:left">
        <b>Welcome:</b>
        <?php
        echo "  "; 
        session_start();
        echo $_SESSION['name'];
        echo "!</br>Please describe the topic you are interested in: "
        ?>

    </div>

<div style="float:right; text-align:right">
    <a href="forum.php">Back</a> |
    <a href="main.php">Home Page</a>
    </br>
</div>
</br>
<form action="search.php" method="post">
    <span><input type="text" name="content" value="Topic"></span>
    <span><input type="submit" name="submit" value="search"></span>
</form>

</div>

<div class="login">
    <center>
        <h2><font color = "#FFFF00">Add a Post Here!</font></h2>
        <hr />
        <h4>Head to our forums to ask questions, share projects, and connect with the deeplearning.ai community!</h4>

        <form action="./publish_check.php" method="post">
            Topic:</br>
            	<input type="text" name="title"><br>
            Message:</br>
            	<textarea rows="10" cols="100" type="text" name="word"> </textarea></br>

            <input type="submit" name="submit" value="Post Now!">
        </form>

    </center>
</div>

</body>
</html>









