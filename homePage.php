<?php
    session_start();


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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Home Page</title>
   
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
        <li class="sidenav__list-item"><a class="active" href="homePage.php">Home</a></li>
            <li class="sidenav__list-item"><a href="showDetails.php">Personal Information</a></li>
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

    <div class="main-cards">
      <div class="card">
      <div class="input-group rounded">
        <input type="search" class="form-control rounded" placeholder="Search location" aria-label="Search"
          aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
          <i class="fas fa-search"></i>
        </span>
      </div>
      <br><br>
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" 
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
          </iframe>
          <a href="https://fmovies2.org">fmovies tu</a>
          <br>
          <a href="https://www.embedgooglemap.net"></a>
          <style></style>
        </div>
      </div>


      </div>
      <div class="card">
        <div class="card-check">
          <h3>Before you start - check yourself</h3>
          <ul class="ul-check">
              <li class="li-check">Helth Check      <a href="#">check</a></li>
              <li class="li-check">Helmet Check     <a href="#">check</a></li>
              <li class="li-check">Connection Check<a href="#">check</a></li>
          </ul>
          <a class="btn-check-all" href="#">CHECK ALL</a>
      </div>

      </div>
      <div class="dot rounded-circle d-flex justify-content-center">
        <span>
          start <br>activity
        </span>        
      </div>
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
