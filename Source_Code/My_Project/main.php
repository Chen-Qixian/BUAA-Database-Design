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
        a:hover {color:#FFFF00;}   /* 鼠标指针移动到链接上 */
        a:active {color:#0000FF;}  /* 正在被点击的链接 */   
    </style>
</head>

<body>
<!-- <img src = "./homePagePic.jpg" style = "max-width:100px;"/> -->
<div class="websitetitle">

    <h2>DeepLearning.AI</h2>
    <h4>
        "Deep Learning is a superpower. With it you can make a computer see, synthesize novel art, translate languages, render a medical diagnosis, or build pieces of a car that can drive itself. If that is not a superpower, I do not know what is."         
    </h4>
    <div style="float:right; text-align:right"> --Andrew Ng</div>
</div> 

<div class="name">

    <div style="float:left; text-align:left">
        <b>Welcome!</b>
        <?php
        echo "  "; 
        session_start();
        echo $_SESSION['name'];
        echo "!</br>Please describe the topic you are interested in:   "
        ?>

    </div>

    <div style="float:right; text-align:right">
    <a href="contribute.php">Contribution</a> |
    <a href="forum.php">Forum</a> | 
    <a href="user_profile.php">My Profile</a> | 
    <a href="login.php">Log out</a> |
    <a href="sponsor.php">Sponse</a>


    </br></div>
    </br>
    <form action="search.php" method="post">
        <span><input type="text" name="content" value="article/author/keywords"></span>
        <span><input type="submit" name="submit" value="search"></span>
    </form>

</div>

<div class="login">


<?php	
    $connect = mysqli_connect('localhost','root','');
   	if (!$connect){
        	echo"<script>alert('Unable to connect to database!')</script>";
    	}
	mysqli_query($connect , "set names utf8");
    mysqli_select_db($connect , "deeplearning");
	$sql1 = "SELECT * FROM category";
    $result1 = mysqli_query($connect , $sql1);
        if($result1)
        {
         	$arr1 = array();
        	while($rs = mysqli_fetch_assoc($result1)){
                $arr1[]=$rs;
            }
        }
	// theme results
	echo  '<font size = "5px"  color="red"><h2>Categories</h2></br><hr/></font>';
	for($i=0;$i<count($arr1);$i++){
            $id = $arr1[$i]['category_id'];
        	$name = $arr1[$i]['category_name'];
			//echo '<img src= '.$p.' style="max-width:200px;"/></br>';
			echo '<a align="left" href="category.php?category='.$id.'"><h3>'.$name.'</h3></a>';
        	$info = $arr1[$i]['category_info'];
        	echo "<p align='left'><font size = '3px'  color='#FF00FF'><b>Brief introduction : </b></font>".$info."</p>";

        	echo "<hr />";
    }	
?>

<center>
    <p>
        <font size = '3px' color = '#FFFF00'> Powered By ChenQixian</font></br>
        <font size = '3px' color = '#FFFF00'> CopyRight@2019 All Rights Reserved</font>
    </p>
</center>

</div>


</body>
</html>
