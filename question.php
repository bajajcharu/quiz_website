<?php include "database.php"; ?>
<?php session_start();
?>
<?php
	//Set question number
	$number = (int) $_GET['n'];
	$selected_choice=(int) $_GET['selected'];
	//Get total number of questions
	
    $p=1;
	if($number!=1)
	$_SESSION['cars'][$selected_choice]=1;
	
	$query = "select * from questions";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total=$results->num_rows;

	// Get Question
	$query = "select * from `questions` where question_number = $number";

	//Get result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$question = $result->fetch_assoc();
    // Get Choices
	//$query = "select * from `choices` where question_number = $number";
	if($number==1)
	$query = "select * from `choices`";
	else
	{
		$arrlength=count($_SESSION['cars']);
		
		for($x=0;$x<$arrlength;$x++)
       {
           if($_SESSION['cars'][$x]==1)
		   $_SESSION['cars2'][$x]=$x;
       }
	   for($x=0;$x<$arrlength;$x++)
	   {
		  //echo $_SESSION['cars'][$x];
	   }
	   $ids = join("','",$_SESSION['cars2']);   
      
	  $query = "select * from `choices` where id NOT IN ('$ids')";

	
	}
	//Get results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
 ?>
  <?php 
  

  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');

  if($pageWasRefreshed ) {
	
    $_SESSION['score']-=5;
	$mysqli = mysqli_connect("localhost", "root", "", "quizzer1");
        $rollNo=$_SESSION['rollNo'];
       $score=$_SESSION['score'];
       $query = "UPDATE login set score = '$score' WHERE Roll_Number = '$rollNo'";
        $result = mysqli_query($mysqli, $query);
		
     //do something because page was refreshed;
    // header('location:indexcopy.php');
 } else {
     //do nothing;
  }
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
			h1{
                color:rgb(14, 12, 121);
				
              }
           
            li{
              font-weight: 500;
              
            }
            
            </style>
    <link rel="stylesheet" href="css/style31.css" >
	<script language ="javascript" >
  var timeleft = 30;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    location.replace("registration.php")
  }
  document.getElementById("progressBar").value = 30 - timeleft;
  timeleft -= 1;
}, 1000);
var keyBoardRefreshMessage = "refresh button is pressed keyboard";
var browserBackRefreshCloseMessage = "browser action";


/*handles backspace and refresh(F5) from keyboard */
window.manageBackRefresh = function(event) {

var tag = event.target.tagName.toLowerCase();
if(event.keyCode == 8 && tag != 'input' && tag !='textarea' && !(is_firefox)) {
	var backOk = confirm(keyBoardBackMessage);
	if(backOk){
		window.landg.innerDocClick =true;
}else{
  location.replace("registration.php")
	event.preventDefault();
}
}else if (event.keyCode == 116) {

	var refreshOk = confirm(keyBoardRefreshMessage);
	if (refreshOk) {
	window.landg.innerDocClick = true;
} else {
  location.replace("registration.php")
	event.preventDefault();
	}

};
};


document.addEventListener("keydown", window.manageBackRefresh);


/* handles browser refresh or close event*/


window.onbeforeunload = function(event) {
	var ele = $(":focus");
if (!window.landg.innerDocClick && (($(ele) == undefined || $(ele).attr("href") == undefined) || ($(ele).attr("href") != undefined && $(ele).attr("href") !="#"))) {
	if (typeof event == undefined) {
		event = window.event;
		}
		if(event) {
			event.returnValue = browserBackRefreshCloseMessage;
			   }
		return browserBackRefreshCloseMessage;
	}
};

/* handles browser back and forward event*/

window.onpopstate = function(event) {
	var ele = $(":focus");
if (!window.landg.innerDocClick && (($(ele) == undefined || $(ele).attr("href") == undefined) || ($(ele).attr("href") != undefined && $(ele).attr("href") != "#"))) {
	var ok = confirm( browserBackRefreshCloseMessage );
	if(ok) {
		
	} else {
		event.preventDfault();
		}
	};
};
    </script>
  </head>
  <body>
  <p class="scrs">socre: <?php echo $_SESSION['score']; ?></p>
    <div id="container">
      <header>
        <div class="container1">
          <h1> QUIZZER : Multiple Choice Questions</h1>
	</div>
      </header>
      <progress value="0" max="30" id="progressBar"></progress>

      <main>
      <div class="container" >
	    <p class="question">
	   <?php echo $number.") " .$question['question'] ?>
	    </p>
	
	<form method="post" action="process.php">
	
	      <ul class="choices">
		  <div class="wrapper">
	        <?php while($row=$choices->fetch_assoc()): ?>
				
		<li>
		
		  <input name="choice" type="radio" value="<?php echo $row['id'];?>" id="timershow"/>
		  
		 <?php echo $row['choice']; ?>
			
		</li>
		
		<?php endwhile; ?>
			</div>
	      </ul>
			
	      <input class="inp" type="submit" value="submit" />
	      <input type="hidden" name="number" value="<?php echo $number; ?>" />

	</form>
      </div>
    </div>
    </main>


    
	
  </body>
 
</html>