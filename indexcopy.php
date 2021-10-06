
<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "quizzer1");
  
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

    if (isset($_SESSION['message'])) 
    {
        $show_message = $_SESSION['message'];
        $_SESSION['message'] = null;
    }

    if (isset($show_message)) 
    {
        echo "<script>alert('{$show_message}');</script>";
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACM_INFOTREK_QUIZ</title>
    <link rel="stylesheet" href="quizstyle1.css">
    <script src="main.js"></script>
    <!--<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>-->
    <script src="https://sindresorhus.com/devtools-detect/index.js"></script>
 <!-- <script>
    window.addEventListener('devtoolschange', function () {
      // optionally clean up all the caches and the storages for the page before the transition
      location = 'about:blank'; // Note: Called even when the Developer Tools pane is already opened on load
    });
  </script>-->
  
</head>
<body>
  <div class="full-page"> 
          <div class="navbar">
            <div class="left">
                <img src="quizimg/acm_logo.png" alt="" height= "50px" width ="50px" >
               
             </div>  
             
            <div>
                <a href='quiz.html'>ACUMEN'21</a>
              
            </div>

             </div>
             <div class="form-box">
                 <div class=log>LOG IN</div>
                <form  action ="submit.php" id='login' class='input-group-login' method = "POST">
                    <input type='number' name="Roll_Number" class='input-field'placeholder='Roll No.' required>
                    <input type='password' name="Password" class='input-field'placeholder='Enter Password' required>
                    <input type='checkbox'class='check-box'><span>Remember Password</span>
                    <button type='submit'class='submit-btn' name="LogIn">submit</button>
                </form>
                
             </div>
           
          </div>
        
    </div>
    <script>
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z=document.getElementById('btn');
        function register()
        {
            x.style.left='-400px';
            y.style.left='50px';
            z.style.left='110px';
        }
        function login()
        {
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }
    </script>
    <script>
        var modal= document.getElementById('login-form');
        window.onclick=function(event)
        {
            if(event.target==modal)
            {
                modal.style.display="none";
            }
        }

    </script>
</body>
</html>