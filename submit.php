<?php
  session_start();
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "quizzer1");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        
        if (isset($_POST['LogIn'])) 
        {
            $Roll_Number =  $_REQUEST['Roll_Number'];
            $Password = $_REQUEST['Password'];
        // $gender =  $_REQUEST['gender'];
        // $address = $_REQUEST['address'];
        // $email = $_REQUEST['email'];
            
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
                $_SESSION['message'] = "Wrong Mobile and Password Combination";
                header('location:indexcopy.php');
            }
        }

        // Close connection
        mysqli_close($conn);
?>
