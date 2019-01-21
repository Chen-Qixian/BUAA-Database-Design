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

<div class="websitesubtitle">
    <h2>Search</h2>
    <h4>
        "Searching results are displayed below!"         
    </h4>
</div>

<div class="name">

    <div style="float:left; text-align:left">
        <b>Welcome!</b>
        <?php
        echo "  "; 
        session_start();
        echo $_SESSION['name'];
        echo "!</br>Please describe the topic you are interested in: "
        ?>

    </div>

    <div style="float:right; text-align:right">
        <a href="main.php">Home Page</a> | 
        <a href="forum.php">Forum</a> | 
        <a href="user_profile.php">My Profile</a> | 
        <a href="login.php">Log out</a> |
        <a href="sponsor.php">Sponse</a>
        </br>
    </div>

    </br>
    <form action="search_post.php" method="post">
        <span><input type="text" name="content" value="post topics"></span>
        <span><input type="submit" name="submit" value="search"></span>
    </form>

</div>

<div class="login">

<center><h3>Query Results</h3></center>

<?php
    if(isset($_POST["submit"]))
    {
        $con = $_POST["content"];
        if($con == "")
        {
            echo "<script>alert('Search content can not be null!'); history.go(-1);</script>";
        }
        else
        {
            $connect = mysqli_connect('localhost','root','');
            if (!$connect){
                echo"<script>alert('Unable to connect to database!')</script>";
            }
            mysqli_select_db($connect , "deeplearning");
            mysqli_query($connect , "set names utf8");
            $sql1 = "SELECT * FROM posts WHERE topic like '%$con%'";

            $result1 = mysqli_query($connect , $sql1);
            if($result1)
            {
         		$arr1 = array();
        		while($rs = mysqli_fetch_assoc($result1)){
                    $arr1[]=$rs;
                }
            } 
        }  
    }
    else  
    {
        echo "<script>alert('Error occurred in search_post.php!'); history.go(-1);</script>";
    }  
?>  
<?php         
    for($i=0;$i<count($arr1);$i++){
            $id = $arr1[$i]['post_id'];
        	$name = $arr1[$i]['topic'];
			//echo '<img src= '.$p.' style="max-width:200px;"/></br>';
			echo '<a align="left" href="post_detail.php?post_id='.$id.'"><h3>'.$name.'</h3></a></br>';
        	$date = $arr1[$i]['time'];
        	echo "<p align='left'><b>Posting Date: </b>".date("Y-m-d H:i:s" , $date)."</p>";
        	$user = $arr1[$i]['user'];
        	echo "<p align='left'><b>Post Owner: </b>".$user."</p>";
        	echo "<hr />";
    }
?>


<center><p><a href="main.php">Home Page</a></p></center>

</div> 


</body>
</html>