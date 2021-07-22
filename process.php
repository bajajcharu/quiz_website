<?php include 'database.php'; ?>
<?php session_start();
 ?>
<?php 

      //Check to see if score is set_error_handler
	if (!isset($_SESSION['score'])){
	   $_SESSION['score'] = 0;
	   $cars=array(0,0,0,0,0,0,0,0,0,0,0);
	   $_SESSION['cars']=$cars;
	   $cars2=array(0,0,0,0,0,0,0,0,0,0,0);
	   $_SESSION['cars2']=$cars2;
	}

//Check if form was submitted
if($_POST){
	$number = $_POST['number'];
	$next=$number+1;
	$total=9;
  if($_POST['choice']==NULL)
  {$_SESSION['score']+=4;
	  goto label;}

    
	$selected_choice = $_POST['choice'];
	
	$next=$number+1;
	$total=9;

	//Get total number of questions
	$query="SELECT * FROM `questions`";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total=$results->num_rows;

	//Get correct choice
	//$q = "select * from `choices` where question_number = $number and is_correct=1";
	$q = "select * from `choices` where question_number = $number ";
	$result = $mysqli->query($q) or die($mysqli->error.__LINE__);
	$row = $result->fetch_assoc();
	$correct_choice=$row['id'];

     

	//compare answer with result
	if($correct_choice == $selected_choice){
	   
		$_SESSION['score']+=10;

	}
	else
	{
		$_SESSION['score']+=3;
	}
	

	/*$sql = "DELETE FROM `choices` WHERE question_number = $number and is_correct=1";

	if (mysqli_query($mysqli , $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}*/
	//$sql = "DELETE FROM `choices` WHERE id=$selected_choice";

/*	if (mysqli_query($mysqli , $sql)) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}*/

   label:

	if($number == $total){
		$_SESSION['score']-=5;
		header("Location: final.php");
		exit();
	} else {
	        header("Location: question.php?n=".$next."&selected=".$selected_choice."&score=".$_SESSION['score']);
	}
	
}
?>