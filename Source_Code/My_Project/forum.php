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
    <h2>Forum</h2>
    <h4>
        "Head to our forums to ask questions, share projects, and connect with the deeplearning.ai community!"         
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
        <a href="main.php">Home Page</a> |
        <a href="publish_posts.php">Add a Post</a>
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
        <h3>Posts</h3>
        <hr />
    </center>

    <?php    	
    	$connect = mysqli_connect('localhost','root','');
            if (!$connect){
                echo"<script>alert('Unable to connect to database！')</script>";
            }
            mysqli_query($connect , "set names utf8");
            mysqli_select_db($connect , "deeplearning");

            $name =  $_SESSION['name'];
            $sql0 = "SELECT * FROM user_list WHERE username = '$name'";
            $result2 = mysqli_query($connect , $sql0);
            $arr2 = array();
            $arr2 = mysqli_fetch_array($result2);
            $user = $arr2['username'];

            $sql = "SELECT * FROM posts";
            $result = mysqli_query($connect , $sql);
            

            if($result){
                    $arr = array(); // post 表中的每一行
                    while($rs = mysqli_fetch_assoc($result)){$arr[]=$rs;}
    			    for($i = 0 ; $i < count($arr) ; $i ++){
                        $id = $arr[$i]['post_id'];       		
                        $topic = $arr[$i]['topic'];
                        $starter = $arr[$i]['user'];
                        $day = date("Y-m-d H:i:s" , $arr[$i]['time']);
        				echo '<a  ><b>Topic:</b></a>';
        				echo '<a  href="post_detail.php?post_id='.$id.'">'.$topic.'</a>';
                        echo '<a style="float:right">publish time:'.$day.'</a>';
                        echo '</br><a  ><b>user:</b></a>';       
                        echo $starter;
                        
        				if($user == $arr[$i]['user']){
        					//session_start();
        					$_SESSION['current_delete_post_id'] = $id;
        					echo '<form action="./delete_post.php" method="post">';	
        					echo '<input style="float:center" type="submit" name="'.$id.'" value="delete">';
        					echo '<input type="hidden" name="postid" value="'.$id.'"  >'; 
        				}
        				
        				echo '<hr />';
    		        }
            }
    	    else
    		   echo "<p>No Posts So Far.</p>";
    ?>
</div>
</body>
</html>
