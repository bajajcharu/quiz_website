<?php include "database.php"; ?>
<?php session_start(); ?>
<?php
	//Set question number
	$number = (int) $_GET['n'];

	//Get total number of questions
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
	$query = "select * from `choices`";

	//Get results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
 
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>PHP Quizzer!</title>
    <link rel="stylesheet" href="css/style1.css" >
	<script language ="javascript" >
  var timeleft = 30;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    location.replace("indexcopy.php")
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
  location.replace("indexcopy.php")
	event.preventDefault();
}
}else if (event.keyCode == 116) {

	var refreshOk = confirm(keyBoardRefreshMessage);
	if (refreshOk) {
	window.landg.innerDocClick = true;
} else {
  location.replace("indexcopy.php")
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
    <div id="container">
      <header>
        <div class="container">
          <h1>PHP Quizzer</h1>
	</div>
      </header>
      <progress value="0" max="30" id="progressBar"></progress>

      <main>
      <div class="container" >
        <div class="current">Question <?php echo $number; ?> of <?php echo $total; ?></div>
	    <p class="question">
	   <?php echo $question['question'] ?>
	    </p>
	
	<form method="post" action="process.php">
	
	      <ul class="choices">
	        <?php while($row=$choices->fetch_assoc()): ?>
			
		<li><input name="choice" type="radio" value="<?php echo $row['id'];?>" id="timershow"/>
		  <?php echo $row['choice']; ?>
		</li>
		<?php endwhile; ?>
   
	      </ul>
	      <input type="submit" value="submit" />
	      <input type="hidden" name="number" value="<?php echo $number; ?>" />

	</form>
      </div>
    </div>
    </main>


    <footer>
      <div class="container">
      	   
      </div>
    </footer>
	
  </body>
  <?php 
  //if browser refresh then login page

  $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');

  if($pageWasRefreshed ) {

    $_SESSION['score']-=2;
     //do something because page was refreshed;
    // header('location:indexcopy.php');
 } else {
     //do nothing;
  }
  ?>
</html>