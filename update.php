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

        $rollNo = $_SESSION['Roll_Number'];
       
        $score = 10;

        $query = "UPDATE login set score = '$score' WHERE Roll_Number = '$rollNo'";
        $result = mysqli_query($conn, $query);

        if(!$result) echo "Something went wrong";
        
        mysqli_close($conn);
      
?>
