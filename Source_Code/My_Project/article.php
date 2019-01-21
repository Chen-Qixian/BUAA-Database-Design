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
    <h2>Article</h2>
    <h4>
        "Get detail information and share your ideas with your fellow!"         
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


</br></div>
</br>
    <form action="search.php" method="post">
        <span><input type="text" name="content" value="article/author/keywords"></span>
        <span><input type="submit" name="submit" value="search"></span>
    </form>

</div>
<div class="login">
<center><h3>Article Detail Information</h3></center>
<hr />
<?php
	$article = $_GET['article'];
	$current_article_id = $article;
	$connect = mysqli_connect('localhost','root','');
        if (!$connect){
                echo"<script>alert('Unable to connect to database！')</script>";
        }
        mysqli_query($connect , "set names utf8");
        mysqli_select_db($connect , "deeplearning");
        // according to theme
        $sql = "SELECT * FROM article WHERE article_id ='$article'";
        $result = mysqli_query($connect , $sql);
        $sql2 = "SELECT * FROM category WHERE category_id in(SELECT category_id FROM article_category WHERE article_id = '$article')";
	    $category = mysqli_query($connect , $sql2);
        if($result){
                $arr = array();
                while($rs = mysqli_fetch_assoc($result)){
                    $arr[]=$rs;
                }
        }
	    if($category){
                $arr2 = array();
                while($rs = mysqli_fetch_assoc($category)){
                    $arr2[]=$rs;  
                }
        }
	            $i=0;
                $id = $arr[$i]['article_id'];
                $name = $arr[$i]['article_title'];
                //$p = $arr[$i][picture];
                //echo '<img src= '.$p.' style="max-width:200px;"/></br>';
                echo '<p><h2>'.$name.'</h2></p>';
                echo "<b>category:</b>";
                $name = $arr2[$i]['category_name'];
                echo $name;
	            for($i=1;$i<count($arr2);$i++){
        	        //$id = $arr2[$i][actor_id];
               		$name = $arr2[$i]['category_name'];
                    echo " , ";
                	echo $name;

        	    }
        	    echo "</p>";
		        $i=0;
                $author = $arr[$i]['article_author'];
                echo "<p align='left'><b>author:</b>".$author."</p>";
                $date = $arr[$i]['article_date'];
                echo "<p align='left'><b>publilsh date:</b>".$date."</p>";
                $link = $arr[$i]['article_url'];
                echo "<p align='left'><b>link: </b><a href = '$link'>".$link."</a></p>";
                $info = $arr[$i]['article_abstract'];
                echo "<p align='left'><b>article abstract:</b></br>".$info."</p>";
?>

<hr />

<center><h3>User Comments</h3></center></br>


</html>        
<?php
		$film = $_GET['article'];
		//session_start();
		$_SESSION['current_article_id'] = $article;
		$result = mysqli_query($connect , "SELECT * FROM comments WHERE article_id = '{$article}' ");
        if($result){
            $arr3 = array();
            while($rs = mysqli_fetch_assoc($result)){ $arr3[]=$rs;}
		    for($i=0;$i<count($arr3);$i++){
        	    $user_id = $arr3[$i]['user_id'];
				$info = $arr3[$i]['comment_text'];
				$time = $arr3[$i]['comment_time'];
                $sql = "SELECT username FROM user_list WHERE user_id ='$user_id' ";
				$result2 = mysqli_query($connect , $sql);
				$arr4 = array();
				$arr4[] = mysqli_fetch_assoc($result2);
				$n_name = $arr4[0]['username'];
				echo "<p align='left'><b>user: </b>".$n_name."</p>";
	            echo "<p align='left'><b>comments:</b></br>      ".$info."</p>";
				echo "<p align='right'><b>comment time:</b>".date("Y-m-d H:i:s" , $time)."</p>";
				echo "<hr />";
        	}
		}
		else
			echo "<p align='left'>No comments for this article!</p>";
		        
?>
<center><h3>Publish your comments HERE!</h3></center></br>
<center>
<form action="comment_check.php" method="post">
<textarea name="comment" style="vertical-align:top" rows="10" cols="70" ></textarea>
</br><input type="submit" name="submit" value="submit">
</center>

<!-- <center><p><a href="main.php">Home Page</a></p></center> -->