<head>
<meta charset="utf-8">
<?php 
    if(isset($_POST["submit"]))
    {
        $user = $_POST["adminname"]; 

        $psw = $_POST["adminpw"];  

        if($user == "" || $psw == "")
        {
            echo "<script>alert('Name or password cannot be null!'); history.go(-1);</script>";
        }   
        else   
        {     
            $connect = mysqli_connect('localhost','root','');
            if (!$connect){
                 echo"<script>alert('Unable to connect to database！')</script>";
            }
            mysqli_select_db($connect , "deeplearning");
            mysqli_query($connect , "set names utf8");
	        $sql = "select * from admin_check_tab where admin_name ='$user' and admin_pwd ='$psw' ";
            $result = mysqli_query($connect, $sql);
            $num = mysqli_num_rows($result);
            if($num)
            {
                session_start();
                $_SESSION['name']=$user;
                header("Location:admin.php");
            }
            else
            {
                echo "<script>alert('Incorrect admin account or password！');history.go(-1);</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('Submission failed！'); history.go(-1);</script>";
    }
?> 
<head>
