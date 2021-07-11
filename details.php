<?php
    session_start();
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
      <div class="main-header__heading">Welcome, <?php echo $_SESSION["user_full_name"]; ?></div>
    </div>
    
    <form action="userDetailsController.php" method="POST" autocomplete>

    <div class="main-cards">
      <div class="card">
        <div class="card-details">
          <h2>Personal Information</h2>

          <label  class="form-label">Your First name:</label>
          <input type="text" name="fname" placeholder="Enter first name" class="form-control" required>

          <label  class="form-label">Last name:</label>
          <input type="text" name="lname" placeholder="Enter last name" class="form-control" required>

          <label  class="form-label">Date of birth:</label>
          <input type="date" name="date" class="form-control" required>
          <div class="form-text">In format dd/mm/yyy</div>

          <label class="form-label">Location:</label>
          <input type="text" name="location" placeholder="Enter your state" class="form-control" required>
          <div  class="form-text"></div>

          <label class="form-label">E-mail:</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="mail" required>

          <label  class="form-label">Phone:</label>
          <input type="text" name="phone" placeholder="Enter first name" class="form-control" required>

          <label class="form-group">Gender:
            <section>
              <input type="radio" name="gender" value="male" checked> Male
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="gender" value="female"> Female
            </section><br><br>
          </label>
          <label class="custom-file">Select image</label>
            <input type="file" id="inputGroupFile02" name="img" accept="image/*" class="custom-file" required>

        </div>
        </div>
        <div class="card unit">
          <h2>Units</h2>
          <label for="exampleInputEmail1" class="form-label">Height
            <input type="number" name="height" placeholder="cm" class="form-control"  
            min="120" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </label>
          <label for="exampleInputPassword1" class="form-label">Weight
            <input type="number" name="weight" placeholder="kg"class="form-control" 
            min="40" id="exampleInputPassword1" required>
          </label>
          <label for="exampleInputEmail1" class="form-label">Age
            <input type="number" name="age" class="form-control" id="exampleInputEmail1" 
            min="14" aria-describedby="emailHelp" required>
          </label>
          <button type="submit" class="btn btn-success">Update Account</button>

        </div>



    </div>
    <script src ="js/scripts.js"></script>
  </form>

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
