 <?php include "database.php"; 
   //Check to see if score is set_error_handler
    session_start();
   /*if (!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
 }*/
 
 
 ?>

<?php


  $_SESSION['score'] = 0;
  $cars=array(0,0,0,0,0,0,0,0,0,0,0);
  $_SESSION['cars']=$cars;
  $cars2=array(0,0,0,0,0,0,0,0,0,0,0);
  $_SESSION['cars2']=$cars2;

 
	//Get the total questions
	$query="select * from questions";
	//Get Results
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHP Quizzer!</title>
    <style>
    body {
              margin: 0;
              background-image: url("quizimg/newimg2.jpg");
              background-color: #090b29;
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-size: cover;
            }
            h2,p{
                color:green;
            }
              h1{
                color:rgb(14, 12, 121);
              }
            ul{
                list-style: none;
            }
            li{
              font-weight: 500;
              
            }
            ul li::before {
                  
                /* \25AA is the CSS Code/unicode for a square */
                content: "\25AA";  
                color:rgb(14, 12, 121); 
                display: inline-block; 
                width: 1em;
                margin-left: -0.9em;
                font-weight: bold;
                font-size:1.5rem;
            }
        
            </style>
    <link rel="stylesheet" href="css/style31.css">
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
        <h1 >!!Quizzer Instructions</h1>
	</div>
      </header>


      <main>
      <div class="container">
	<ul>
		<li><strong>Number of MCQs: </strong><?php echo $total; ?></li>
    <li><strong></strong>For Correct Choice You Will Get 5 Marks.</li>
    <li><strong></strong>For Wrong Choice 2 Marks will be reduced.</li>
    <li><strong></strong>Not Marked 1 mark will be reduced.</li>
    <li><strong></strong>Try to refresh the the page unneccessarily then 5 marks will be reduced.</li>
    <li><strong></strong>30 second for each question.</li>
    <li><strong></strong>If you not submit each ques with in 30 second then you will be logged out.</li>
		<li><strong>Estimatd Time: </strong><?php echo $total*0.5; ?> minutes</li>
	</ul>
  <br>
  
	<a href="question.php?n=1&selected=0" class="start">Start Quiz</a>
      </div>
    </div>
    </main>

  </body>
</html>