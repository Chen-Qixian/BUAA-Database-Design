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

<?php
    //session_start();
    //$n = $_SESSION['name'];
    if(isset($_POST["submit"]))
    {

        $title = $_POST["title"];
        $author = $_POST["author"];
        $category = $_POST["category"];
        $abstract = $_POST["abstract"];
        $date = $_POST["date"];
        $link = $_POST["link"];

        if($title == "" || $author == "" ||$category == "" ||$date == "" ||$link == "" ||$abstract == "" )
        {
            echo "<script>alert('Null is not acceptable!'); history.go(-1);</script>";
        }
        else
        {
            $connect = mysqli_connect('localhost','root','');
            if (!$connect){
                 echo"<script>alert('Unable to connect to database！')</script>";
            }
            mysqli_select_db($connect , "deeplearning");
            $sql0 = "SELECT * FROM category WHERE category_name LIKE '$category'";
            $result0 = mysqli_query($connect , $sql0);
            if(!$result0){
                echo "<script>alert('cannot find a certain category!'); history.go(-1);</script>";
            }
            else{
                $arr = array();
                while($rs = mysqli_fetch_assoc($result0)){ $arr[]=$rs; }
                $category_id = $arr[0]['category_id'];
                $category_id = (int)($category_id);
                //var_dump($category_id);
                //echo $category_id;
                $sql1 = "INSERT INTO article (article_title , article_author , article_abstract , article_date , article_url) VALUES ('$title','$author','$abstract' ,'$date','$link')";
                //$result1 = mysqli_query($connect , $sql1);
                $sql2 = "SELECT * FROM article WHERE article_title = '$title'";
                $result2 = mysqli_query($connect , $sql2);
                $arr1 = array();
                while($rs = mysqli_fetch_assoc($result2)){ $arr1[]=$rs; }
                $article_id = $arr1[0]['article_id'];
                $article_id = (int)$article_id;
                //var_dump($article_id);
                $sql3 = "INSERT INTO article_category (category_id , article_id) VALUES ($category_id , $article_id)";
                $result3 = mysqli_query($connect , $sql3);
                
            }
        }
    }
?>

<div class="login"> 
    <center>
    <h2> Contribute Succeed！</h2> 
    </p>
    Return to previous page automatically within 2 seconds.
    </p>  
    <?php header("refresh:2;url=contribute.php");  ?>
</div>