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


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration form</title>
    
        <style>
            body {
              margin: 0;
              background-image: url("quizimg/newimg3crp.jpg");
              background-color: #090b29;
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
            }
            .topnav {
              overflow: hidden;
              padding-right: 30px;
              background-color:none;
            }
            
            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              font-size: 17px;
            }
            
            .topnav a:hover {
              background-color: rgb(8, 10, 0);
            }
            .im {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            }
            ul {
                display: table;
                margin-left: auto;
                margin-right: auto;
                list-style-type: circle;
            }

            ul li {
                margin-right: 1rem;
            }
        </style>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/email-icon.png" type="image/gif" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="stylereg1.css">
    <script src="validator.js"></script>
  </head>
  <body>
    <div class="topnav">
            <img class = 'logo' src="quizimg/acm_logo.png" width="80px" height="60px">
            
            <img class='trichy' src="quizimg/trichylogo.png" width="70px" height="50px"></a>
            
        </div> 
        <a href='quiz.html'>INFOTREK'21</a>
            
    <div class="main-block">
    <form name="RegForm" onsubmit="return validateForm()"  method="POST" action="submit.php">
      <h1>Register</h1>
      
     
        
        <div  class="personal-details">
          <div>
            <div><input type="text" placeholder='Roll No.'required="Please Enter" name="Roll_Number"></div>
          </div>
         
           
          </div>
        
     

     
        
          <div  class="contact-details">
          <div><input type="Password" placeholder='Password' name="Password1" required="Please Make your password"></div>
          <div><input type="Password" placeholder='confirm password' name="Password2" required="Please confirm your password"></div>
        </div>
     
      <button type="submit" value="send" name="Submit">Submit</button>
    </form>
    </div> 
    <footer>
      <div class="container">
      	   Copyright &copy; 2021, ACM PHP Quizzer
      </div>
    </footer>
  </body>
</html>