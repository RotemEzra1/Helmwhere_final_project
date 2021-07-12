<?php
    include 'db.php';
    include "config.php";
    include "function.php";

    session_start();

    $is_valid_user = true;
    $errorMesg = "";

    if(isset($_POST["user_name"])){

        if( !empty($_POST["user_name"]) )
        {
            $user_name = $_POST["user_name"];
    
            if ( strlen(trim($user_name)) <= 0 ){
                $is_valid_user = false; 
                $errorMesg .= "Invalid user name, ";   
            }
        }
    
        if( !empty($_POST["email"]) )
        {
            $email = $_POST["email"];
    
            $sql = "SELECT * FROM tbl_users_202 WHERE email = '".$email."'" ;
            $result = mysqli_query( $connection, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                $is_valid_user = false;
                $errorMesg .= "email allready exist, ";  
            } 
    
            if ( strlen(trim($email)) <= 0 )
            {
                $is_valid_user = false;
                $errorMesg .= "Invalid email, ";  
            }
        
        }
    
        if( !empty($_POST["password"]) )
        {
            $password = $_POST["password"];
    
            if ( strlen(trim($password)) <= 0 ){
                
                $is_valid_user = false;
                $errorMesg .= "Invalid password";  
            }
        }
        
        if ($errorMesg == '') {
            add_user_to_db($user_name, $email, $password);

            $user_id = get_user_id_from_db($user_name);

            userSESSION($user_id);

            header('Location: ' . HOME_PAGE_URL .  "?user_id=" . $user_id);
        } else {

            header('Location: index.php?errorMesg=' . $errorMesg);

        }
     
    
    }

    
?>
<?php
  if ($connection)
  {
    $connection->close();          
  }
?>