<?php

    include 'db.php';
    include "config.php";


    session_start();

    $user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>userDetailsController</title>
        </head>
    <body>
        <?php

            function  update_user_details_in_db( $user_id, $fname,$lname,$date,$location,$email,$gender,
                                                 $height,$weight,$age,$phone,$img )
            {
                global $connection;

                $sql = "UPDATE tbl_users_202 SET " .
                        "firstName='$fname', " .
                        "lastName='$lname',  " .
                        "birthDate='$date', " .
                        "state='$location',  " .
                        "email='$email', " .
                        "gender='$gender',  " .
                        "height=$height,  " .
                        "weight=$weight, " .
                        "age=$age, " .
                        "img='$img', " .
                        "phone='$phone' " .
                        "WHERE user_id = $user_id";

                // echo "SQL: " . $sql . "<br/>";    

                $status = mysqli_query( $connection, $sql );

                // echo "status: " . $status;
                // die();

                

                return $status;      
            }

            $fname = $_POST["fname"]; 
            $lname = $_POST["lname"];
            $date = $_POST["date"];
            $location = $_POST["location"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $height = $_POST["height"];
            $weight = $_POST["weight"];
            $age = $_POST["age"];
            $img = $_POST["img"];
            $phone = $_POST["phone"];

            $status = update_user_details_in_db($user_id,$fname,$lname,$date,$location,$email,
                                                $gender,$height,$weight,$age,$phone,$img);

            if(!$status)
            {
                $_SESSION["last_status"] = mysqli_error($connection);
                header("Location: index.php?error=failed_to_update_user_details");
            }

           /* echo "<h1>$fname, your updated details are:</h1>" ;
            echo "<h2> your first name is:" .$fname. "</h2>" ;
            echo "<h2> your last name is:" .$lname. "</h2>" ;
            echo "<h2> your Birth date  is:" .$date. "</h2>" ;
            echo "<h2> your state  is:" .$location. "</h2>" ;
            echo "<h2> your Email is:" .$email. "</h2>" ;
            echo "<h2> your Gender is:" .$gender. "</h2>" ;
            echo "<h2> your height is:" .$height. "</h2>" ;
            echo "<h2> your Weight is:" .$weight. "</h2>" ;
            echo "<h2> your age is:" .$age. "</h2>" ; */


            $_SESSION["user_full_name"] = $fname . " " . $lname;
            $_SESSION["user_picture"] = $img;   

            header("Location: showDetails.php");
        ?>
    </body>
</html>
<?php
  if ($connection)
  {
    $connection->close();          
  }
?>