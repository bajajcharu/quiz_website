<?php
  session_start();
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        // initializing variables
$name = "";
$roll = "";
$errors = array(); 
        $conn = mysqli_connect("localhost", "root", "", "quizzer1");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

if (isset($_POST['Submit'])) 
{
  // receive all input values from the form
  //$name = $_POST['Name'];
  $roll =$_POST['Roll_Number'];

  $pass1 = $_POST['Password1'];
  $pass2 = $_POST['Password2'];

 

  if ($pass1 != $pass2) {
    echo $pass1;
    echo $pass2;
    echo "The two passwords do not match";
  }
  $user_check_query = "SELECT * FROM login WHERE Roll_Number='$roll' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  {
    if ($user['Roll_Number'] == $roll)
    {
      $_SESSION['message'] = "Roll Number already Register you cant login now";
      Header("location: registration.php");
      exit();
    }
  }
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
      
    $dataArray=array();
    $dataArray[]=array(
                      'Roll_Number' =>$roll, 
                      );
  
    $query1 = "INSERT INTO login (Roll_Number,Password) 
          VALUES('$roll','$pass1')";

       mysqli_query($conn, $query1);
        
        
      
       
        $_SESSION['message'] = "Successfully Registered";
        header('location: indexcopy.php');
       
  }
}

        if (isset($_POST['LogIn'])) 
        {
            $Roll_Number =  $_REQUEST['Roll_Number'];
            $Password = $_REQUEST['Password'];
       
            // Performing insert query execution
            // here our table name is login
            $sql = "SELECT * FROM login WHERE Roll_Number='$Roll_Number' AND Password='$Password'";
            $results = mysqli_query($conn, $sql);

            if (mysqli_num_rows($results) == 1) 
            {
                $_SESSION['rollNo'] = $Roll_Number;
                $_SESSION['message'] = "You are now logged in";
                header('location: index.php');
            }
            else 
            {   
                $_SESSION['message'] = "Wrong roll and Password Combination";
                header('location:indexcopy.php');
            }
        }

        // Close connection
        mysqli_close($conn);
?>
