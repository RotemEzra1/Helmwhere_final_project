<?php 

    function userSESSION($user_id){

        global $connection;

        $sql = "SELECT * FROM tbl_users_202 WHERE user_id='".$user_id."'";

        $result = mysqli_query( $connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                session_unset();


                $_SESSION["user_login"] = 'true';
                $_SESSION["user_id"] = $user_id;
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["user_email"] = $row['email'];;
                $_SESSION["user_picture"]= $row['img'];;
                $_SESSION["user_full_name"]= $row['firstName'].' '.$row['lastName'] ;
        
            }
          } else {
            return false;
          }
    }

    function user_login (){

        if(isset($_SESSION['user_login']) && $_SESSION['user_login'] == 'true'){
            return true;

        } else {
            return false;
        }

    }

    function add_user_to_db($user_name, $email, $password)
    {
        global $connection;
        
        $sql = "INSERT INTO tbl_users_202 (user_name,email,password) " . 
               "VALUE ('$user_name','$email','$password')";

        $status = mysqli_query( $connection, $sql );

        return $status;
    }


    function get_user_id_from_db($user_name)
    {
        global $connection;
        
        $sql = "SELECT user_id from tbl_users_202 WHERE user_name='$user_name'";

        $result = mysqli_query( $connection, $sql );

        if (!$result)
        {
            die("Sorry, failure in server. Failed connecting to DB.");
        }
            //wont work if 2 userd share same name
        if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result) < 2 )
        {
            $row = mysqli_fetch_assoc($result);
            return $row["user_id"];    
        }

        return -1;        
    }