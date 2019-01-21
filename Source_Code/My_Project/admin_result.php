<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
	<style>
		.websitetitle {
            background-image :url(./home1.jpg);
            color:white;
            margin:20px;
            padding:20px;
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
		<p>Operation Result</p><p>
		<?php
			if(isset($_POST["submit"])) {
				$item=$_POST["item"];
				if($item == ''){
					echo "<script>alert('Invlaid SQL!'); history.go(-1);</script>";
				}
				else{
					$con = mysqli_connect('localhost','root','');
					if(!$con){
					    echo "<script>alert('Unable to connect to Database!'); history.go(-1);</script>"; 
					}
					mysqli_select_db($con , "deeplearning");
					mysqli_query($con , "set names utf8");
					$result = mysqli_query($con , $item);
					if($result == false){
						echo "<script>alert('Invlaid SQL!'); history.go(-1);</script>";
					}
					else{
						$arr = array();
						while($rs = mysqli_fetch_assoc($result)){ $arr[]=$rs; }
						print_r($arr);
					}
					
				}							
			}else{
				 echo "<script>alert('Fail to fetch contents.'); history.go(-1);</script>";
			}
		?>
		</p>
		<br/>
		<a href="admin.php">return to admin page</a>
	</center>

</div>


