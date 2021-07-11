
<?php
    include 'db.php';
    include "config.php";

    session_start();

    // echo '<pre>';
    // echo "Session: ";
    // var_dump($_SESSION);
    // echo '</pre>';


    $user_id = $_SESSION["user_id"];

    $user_name_exists = false;
    if( !empty($_SESSION["user_name"]) )
    {
      $user_name = $_SESSION["user_name"];

      if ( strlen(trim($user_name)) > 0 )
      {
        $user_name_exists = true;
      }
    }

    $user_full_name_exists = false;
    if( !empty($_SESSION["user_full_name"]) )
    {
      $user_full_name = $_SESSION["user_full_name"];

      if ( strlen(trim($user_full_name)) > 0 )
      {
        $user_full_name_exists = true;
      }
    }

    $user_picture_exists = false;
    if( !empty($_SESSION["user_picture"]) )
    {
      $user_picture = $_SESSION["user_picture"];
      if ( strlen(trim($user_picture)) > 0 )
      {
        $user_picture_exists = true;
      }
    }


    function get_user_details_from_db($user_id)
    {
        global $connection;
        
        $sql = "SELECT firstName, lastName, img, email, phone, password, gender, age, weight, height, birthDate, state " .
               "FROM tbl_users_202 " .
               "WHERE user_id = $user_id";

        $result = mysqli_query( $connection, $sql );

        if (!$result)
        {
            die("Sorry, failure in server. Failed reading from DB.");
        }

        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            return $row;    
        }

        return -1;        
    }

    $row = get_user_details_from_db( $user_id );
  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">




    
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Profile</title>
   
</head>
<body>
     <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   
  <header class="header">
    <a href="homePage.php" id="logo"></a>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>
    <nav>
        <ul class="sidenav__list">
        <li class="sidenav__list-item"><a href="homePage.php">Home</a></li>
            <li class="sidenav__list-item"><a class="active" href="showDetails.php">Personal Information</a></li>
            <li class="sidenav__list-item"><a href="progress.php">Activities</a></li>
            <li class="sidenav__list-item"><a href="#">Inbox</a></li>
            <li class="sidenav__list-item"><a href="#">Equipment Check</a></li>
            <li class="sidenav__list-item"><a href="#">Emergency Contacts</a></li>
            <li class="sidenav__list-item"><a href="#">Terms & Conditions</a></li>
            <li class="sidenav__list-item"><a href="#">Privacy Policy</a></li>
            <li class="sidenav__list-item"><a href="#">Setting</a></li>
            <li class="sidenav__list-item"><a href="logout.php">Log Out</a></li>
      </ul>
    </nav>
  </aside>


  <main class="main">
  <div class="main-header">
      <div class="main-header__heading">

        <?php
          if ($user_picture_exists)
          {
        ?>

          <img src="images/<?php echo $user_picture; ?>">  
          
        <?php
          }

          if ($user_full_name_exists)
          {
        ?>
              <span>Welcome <?php echo $_SESSION["user_full_name"]; ?></span> 
        <?php
          }
          else
          {
        ?>  
            <span>Please enter your <a href="./details.php">personal details</a></span>
        <?php
          }
   
        ?>  
      

      </div>
    </div>
    <div class="main-cards showdetails">
      <div class="card">
        <div class="card-showdetails">
          <h2>Personal Information</h2>

          <div class="div-fname">
              <h5>First Name</h5>
              <span><?php echo $row["firstName"]; ?></span>        
              <hr>

          </div>
          <div class="div-lname">
              <h5>Last Name</h5>
              <span><?php echo $row["lastName"]; ?></span>
              <hr>
          </div>
          <div class="div-dbirth">
              <h5>Date of birth</h5>
              <span><?php echo $row["birthDate"]; ?></span>
              <hr>
          </div>
          <div class="div-state">
              <h5>State</h5>
              <span><?php echo $row["state"]; ?></span>
              <hr>
          </div>
          <div class="div-gender">
              <h5>Gender</h5>
              <i class="bi bi-gender-female"></i><span><?php echo $row["gender"]; ?></span>
              <i class="bi bi-gender-male"></i>
              <hr>

          </div>
          <div class="div-email">
              <h5>Email</h5>
              <span><?php echo $row["email"]; ?></span>
              <hr>

          </div>
          <div class="div-phone">
            <h5>Phone</h5>
            <span><?php echo $row["phone"]; ?></span>
            <hr>
          </div>
        </div>
      </div>
      <div class="card unit">
        <h2>Units</h2>
        <div class="div-height">
          <h5>Height</h5>
          <span><?php echo $row["height"]; ?> CM</span>

          <hr>
      </div>
      <div class="div-weight">
        <h5>Weight</h5>
        <span><?php echo $row["weight"]; ?> KG</span>

        <hr>
      </div>
      <div class="div-age">
        <h5>Age</h5>
        <span><?php echo $row["age"]; ?></span>

        <hr>
      </div>


      </div>
      
      <form action="details.php" method="GET" autocomplete>
          <button type="submit" class="btn btn-success">Edit Details</button>
      </form>
      <br><br><br>
      



    </div>
    <script src ="js/scripts.js"></script>

  </main>
  <footer class="footer">
    <ul class="ul-footer">
      <li class="li-footer"><a href="#"><i class="fas fa-running"></i></a></li>
      <li class="li-footer"><a class="active-footer" href="homePage.php"><i class="bi bi-house-door-fill"></i></a></li>
      <li class="li-footer"><a href="progress.php"><i class="bi bi-bar-chart-fill"></i></a></li>
    </ul>

  </footer>
</div>
</body>
</html>

<?php
  if ($connection)
  {
    $connection->close();          
  }
?>