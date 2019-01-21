<head>
<meta charset="utf-8">
<?php 
    if(isset($_POST["submit"]))
    {

        $username = $_POST["usrname"]; 
	$usernickname = $_POST["usrnickname"];
        $userpsw1 = $_POST["usrpw1"];  
	$userpsw2 = $_POST["usrpw2"];
	$useremail = $_POST["usremail"];
	$userphone = $_POST["usrphone"];

        if($username == "" || $usernickname == "" || $userpsw1 == "" ||$userpsw2 == "" ||$useremail == "" ||$userphone == "")
        {
            echo "<script>alert('Null is not acceptable!'); history.go(-1);</script>";
        }   
        else   
        {     
            $connect = mysqli_connect('localhost','root','');
            if (!$connect){
                 echo"<script>alert('Unable to connect to database！')</script>";
            }
            //echo "Succeed";
            mysqli_select_db($connect , "deeplearning");
	        $sql0 = "SELECT * FROM user_list WHERE username LIKE '$username'";
	        $result0 = mysqli_query($connect , $sql0);
	        $num0 = mysqli_num_rows($result0);
	        if($num0 != 0){
		          echo "<script>alert('Sorry, the user name already exists,please try again.'); history.go(-1);</script>";
	        }
	        else if($userpsw1 != $userpsw2){
		        echo "<script>alert('password confirmation failed!'); history.go(-1);</script>";
	        }
	        else{
		      $sql = "INSERT INTO user_list(user_id, tel , password, realname , email ,username) 
			     VALUES (NULL, '$userphone', '$userpsw1', '$usernickname', '$useremail', '$username')";
		      $result = mysqli_query($connect , $sql);
              echo "succeed.";
		       header("Location:reg_succeed.php");
	        }
        }
    }
    else
    {
        echo "<script>alert('Register Failed！'); history.go(-1);</script>";
    }
?> 
<head>

