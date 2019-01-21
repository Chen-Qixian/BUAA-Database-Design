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
            .a{
                width: 300px;
                height: 30px;
            }
             #b{
                width: 400px;
                text-align: right;·
            }        
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
            <h2>Register</h2>
            <h4>
                "Register to become a member of DeepLearning.AI. Ask questions, share projects, and connect with the deeplearning.ai community!"         
            </h4>
        </div>

        <div class="login">
            <center>
                <h3>Register</h3>

                <p>
                    Please fill in the forms below
                <div id="b">
                    <form action="./reg_check.php" method="post">
                        user name: <input type="text" class="a" name="usrname">
                        <br>
                        real name: <input type="text" class="a" name="usrnickname">
                        <br>
                        password: <input type="text" class="a" name="usrpw1">
                        <br>
                        confirm: <input type="text" class="a" name="usrpw2">
                        <br>
                        e-mail: <input type="text" class="a" name="usremail">
                        <br>
                        Tel: <input type="text" class="a" name="usrphone">
                        <br>

                        <center>

                            <p>
                                Please press 'submit' button below.
                            </p>
                            </br>
                            <input type="submit" name="submit" value="register">


                        </center>
                    </form>
                </div>
            </center>
        </div> 


    </body>
</html>