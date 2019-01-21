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
    <h2>Posts</h2>
    <h4>
        "Find out brand new ideas & Follow the state of art!"         
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
        <a href="main.php">Home Page</a> |
        <a href="publish_posts.php">Add a Post</a> |
        <a href="admin_log.php">Admin Login</a>
        </br>
    </div>
    </br>
    <form action="search_post.php" method="post">
        <span><input type="text" name="content" value="post topic"></span>
        <span><input type="submit" name="submit" value="search"></span>
    </form>

</div>

<div class="login">
    <center>
        <h3>Post Details</h3>
        <hr />
    </center>

    <?php
    	$postid = $_GET['post_id'];

    	$_SESSION['current_post_id'] = $postid;
        $connect = mysqli_connect('localhost','root','');
        if (!$connect){
            echo"<script>alert('Unable to connect to database！')</script>";
        }
        mysqli_query($connect , "set names utf8");
        mysqli_select_db($connect , "deeplearning");
        $sql = "SELECT topic,msg FROM posts WHERE post_id = $postid";
    	$result = mysqli_query($connect , $sql);
    	$arr = array();
    	$arr[] = mysqli_fetch_array($result);
 
    	$topic = $arr[0]['topic'];
    	$info = $arr[0]['msg'];
    	echo '<p><b>Topic:</b>';
        echo ''.$topic.'';
    	echo '<p><b>Message:</b></br>       '.$info.'<hr />';
    		
    	$sql = "SELECT * FROM posts_info WHERE post_id = $postid ";
        $result = mysqli_query($connect , $sql);
        if($result){
            $arr = array();
            while($rs = mysqli_fetch_assoc($result)){ $arr[]=$rs;  }
            for($i = 0 ; $i < count($arr) ; $i ++){
                $user_id = $arr[$i]['user_id'];
                $time = $arr[$i]['respond_time'];
    			$info = $arr[$i]['respond_msg'];
                $sql1 = "SELECT realname FROM user_list WHERE user_id = '$user_id'";
    			$result2 = mysqli_query($connect , $sql1);
    			$arr2 = array();
    			$arr2[] = mysqli_fetch_array($result2);
    			$name = $arr2[0]['realname'];
    			echo '<p><b>User:'.$name.'</b><a style="float:right">comment time: '.date("Y-m-d H:i:s" , $time).'</a></p>';
    			echo "<p align='left'><b>Reply:</b></br>".$info."</p>";
                echo '<hr/>';
            }
        }
        else
            echo "<p>Nobody commented on this post.</p>";
    ?>
    <br/>
    <center>
        <h3>Comment Here & contact with author</h3>
    </center>
    </br>
    <center>
        <form action="./publish_judge.php" method="post">
        <textarea name="comment" style="vertical-align:top" rows="10" cols="100" ></textarea>
        </br><input type="submit" name="submit" value="submit">
    </center>

</div>
</body>
</html>