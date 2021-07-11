<?php
  include 'db.php';
  include "config.php";
  include "function.php";

  session_start(); 
   
  if(isset($_POST["loginMail"])) {

    $email = $_POST["loginMail"];
    $pass = $_POST["loginPass"];

    $query = "SELECT * FROM tbl_users_202 WHERE email='". $email ."' and password = '"  .$pass ."'";
  
    $result = mysqli_query($connection , $query);
    $row    = mysqli_fetch_array($result); 
        
    if(is_array($row)) {

        userSESSION($row["user_id"]);

        header('Location: ' . HOME_PAGE_URL .  "?user_id=" . $_SESSION["user_id"]);
    }
    else {

      $message = "Invalid Username or Password!";
  
  }
  
}
  
      
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <title>Log in</title>
   
</head>

<body class="body-login">

<?php
    if (isset($_SESSION["last_status"])) {
        echo "Last status: " . $_SESSION["last_status"] . "<br/>";
        unset($_SESSION["last_status"]);
    }

    if (isset($_GET["errorMesg"])){
        ?>
        <div class="text-center">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_GET["errorMesg"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
        <?php
         
    
    }
?>

<div class="login-pic">
  <div id="logreg-forms">
    <form class="form-signin" method="post" id="frm">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
        <div class="social-login">
            <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
            <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
        </div>
        <p style="text-align:center"> OR  </p>

        
        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""> -->


        <input type="email" class="form-control" name="loginMail" id="loginMail"
            aria-describedby="emailHelp" placeholder="Enter Email" require/>

        <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""> -->

        <input type="password" class="form-control" name="loginPass" id="loginPass"
            placeholder="Enter Password" require />
        
        <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        <a href="#" id="forgot_pswd">Forgot password?</a>
        <hr>


        <!-- <p>Don't have an account!</p>  -->
        <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus" ></i> Sign up New Account</button>
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>   

        </form>

        <form action="#" class="form-reset">
            <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
            <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
        </form>
        
        <form action="signUp.php" method="POST" class="form-signup">
            <!-- <div class="social-login">
                <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign up with Facebook</span> </button>
            </div>
            <div class="social-login">
                <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign up with Google+</span> </button>
            </div>
            
            <p style="text-align:center">OR</p> -->

            <input type="text" id="user-name" name="user_name" class="form-control" placeholder="User name" required autofocus="">
            <input type="email" id="user-email" name="email" class="form-control" placeholder="Email address" required autofocus="">
            <input type="password" id="user-pass" name="password" class="form-control" placeholder="Password" required autofocus="">

            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
            <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
        </form>
        <br>
        <script src="js/scripts.js"></script>
</div>
</div>
</body>
</html>
<?php
    mysqli_close($connection);
?>