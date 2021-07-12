
<?php
    session_start();
    include 'db.php';
    include "config.php";
    include "function.php";

    if(isset($_POST['date'])) {
        
        $sql = "INSERT INTO tbl_activity_202 (date, activity_type, distance, time, kcal, note)
        VALUES ('".$_POST['date']."', '".$_POST['activity_type']."', 
        '".$_POST['distance']."','".$_POST['time']."','".$_POST['kcal']."','".$_POST['note']."')";

        if ($connection->query($sql) === TRUE) {
            $last_id = $connection->insert_id;
        } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
        }

        $sql = "INSERT INTO tbl_user_activity_202 (activity_id, user_id)
        VALUES ('".$last_id."', '".$_SESSION["user_id"]."')";

        if ($connection->query($sql) === TRUE) {
        } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Activity</title>
   
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
              <li class="sidenav__list-item"><a href="showDetails.php">Personal Information</a></li>
              <li class="sidenav__list-item"><a class="active" href="progress.php">Activities</a></li>
              <li class="sidenav__list-item"><a href="activietNote.php">Notes</a></li>
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
    
    <form method="POST">

    <div class="main-cards">
      <div class="card new-active">
        <h2>Add an Activity</h2>

        <label  class="form-label">Activity date</label>
        <input type="date" name="date" class="form-control" require>
        <div class="form-text">In format dd/mm/yyy</div>

        <label  class="form-label">Activity</label>
        <select name="activity_type" class="form-select">
          <option value="0">All Activities</option>
          <option value="1">Biking</option>
          <option value="2">Kiting</option>
          <option value="3">Snowboarding</option>
          <option value="4">Cycling</option>
          <option value="5">Ice Climbing</option>
          <option value="6">Hockey</option>
          <option value="7">Climbing</option>
          <option value="8">Body Boarding</option>
          <option value="9">Powerbocking</option>
          <option value="10">Mountain Boarding</option>
          <option value="11">Parasailing</option>
          <option value="12">Rafting</option>
          <option value="13">BMX</option>
        </select>   

        <label class="form-label">Distance
          <input type="number" name="distance" placeholder="KM" class="form-control"  min="0" id="exampleInputEmail1" aria-describedby="emailHelp" require>
        </label>

        <label class="form-label">Time</label>
        <input type="text" name="time" placeholder="Enter time" class="form-control" require>
        <div class="form-text">In format HH:MM:SS</div>

        <label class="form-label">Kcal
          <input type="number" name="kcal" placeholder="Kcal"class="form-control" id="exampleInputPassword1" require>
        </label>

        <label class="form-label">Note<br>
        <textarea id="w3review" name="note" rows="4" cols="35" require>
        </textarea>
        </label>



        <button type="submit" class="btn btn-success">Add Activity</button>



      </div>





    </div>
    <script src ="js/scripts.js"></script>
  </form>

  </main>
 
  <footer class="footer">
    <ul class="ul-footer">
      <li class="li-footer"><a href="#"><i class="fas fa-running"></i></a></li>
      <li class="li-footer"><a href="homePage.php"><i class="bi bi-house-door-fill"></i></a></li>
      <li class="li-footer"><a class="active-footer" href="progress.php"><i class="bi bi-bar-chart-fill"></i></a></li>
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