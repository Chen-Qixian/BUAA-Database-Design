<head>
<meta charset="utf-8">
<?php
    if(isset($_POST["submit"]))  
    {  
        $user = $_POST["usrname"]; 
	
        $psw = $_POST["usrpw"];  

        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('User name or password cannot be NULL!'); history.go(-1);</script>";  
        }  
        else  
        {    
	        $connect = mysqli_connect('localhost','root','');
            if (!$connect){
           	 echo"<script>alert('Unable to connect to database！')</script>";
	        }
            mysqli_select_db($connect , "deeplearning");  
            mysqli_query($connect , "set names utf8");
            $sql = "select * from user_list where username ='$user' and password ='$psw' ";
            $result = mysqli_query($connect , $sql);  
            $num = mysqli_num_rows($result);  
            if($num)  
            {  
		        echo "<script>alert('Welcome to DeepLearning.AI！');</script>";
		        session_start();
		        $_SESSION['name']=$user;
                echo $_SESSION['name'];
		        header("Location:main.php");
            }  
            else  
            {  
                echo "<script>alert('Incorrect user name and password！');history.go(-1);</script>"; 
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('Log in failed！'); history.go(-1);</script>";  
    }  
?> 
<head>
