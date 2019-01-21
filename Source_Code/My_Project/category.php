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
    <h2>Categories</h2>
    <h4>
        "Take a quick view of the field that you interested in!"         
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
    <form action="search.php" method="post">
        <span><input type="text" name="content" value="article/author/keywords"></span>
        <span><input type="submit" name="submit" value="search"></span>
    </form>

</div>

<div class="login">
<center><h3>Category Details</h3></center>
<hr />


<?php
        $category = $_GET['category'];
        $connect = mysqli_connect('localhost','root','');
        if (!$connect){
                echo"<script>alert('Unable to connect to database!')</script>";
        }
        mysqli_query($connect , "set names utf8");
        mysqli_select_db($connect , "deeplearning");
        $sql = "SELECT * FROM category WHERE category_id ='$category'";
        $result = mysqli_query($connect , $sql);
        
        if($result){
                $arr = array();
                while($rs = mysqli_fetch_assoc($result)){
                    $arr[]=$rs;  
                }
        }

        $i=0;
        $cat_name = $arr[$i]['category_name'];
        $info = $arr[$i]['category_info'];
        echo "<p align='left'><h2>".$cat_name."</h2></p>";
        echo "<p align='left'><font size = '4px'  color='#FFFF00'><b>Introduction: </b></font></br>".$info."</p>";

        echo "<hr/>";
        $sql2 = "SELECT * from article WHERE article_id in (SELECT article_id FROM article_category WHERE category_id = '$category')";
        $result2 = mysqli_query($connect , $sql2);
        if($result2){
            $arr2 = array();
            while($rs = mysqli_fetch_assoc($result2)){
                $arr2[] = $rs;
            }
        }
        for($i = 0 ; $i < count($arr2) ; $i ++){
            $id = $arr2[$i]['article_id'];
            $name = $arr2[$i]['article_title'];
            echo '<a align="left" href="article.php?article='.$id.'"><h3>'.$name.'</h3></a></br>';
            $author = $arr2[$i]['article_author'];
            echo '<font size = "3px"  color="#FF00FF"><b>author : </b></font>'.$author.'</br>';
            $abstract = $arr2[$i]['article_abstract'];
            echo '<font size = "3px"  color="#FF00FF"><b>abstract : </b></font>'.$abstract.'</br>';
            echo "<hr/>";
        }
?>


</body>
</html>

