
<?php
    session_start();
    include 'db.php';
    include "config.php";
    include "function.php";

    $date = $activity_type = $distance = $time = $kcal = $note = "";

    if(isset($_GET['activity_id'])){

      $sql = "SELECT * FROM tbl_activity_202 WHERE activity_id='".$_GET['activity_id']."'";
          
      $result = mysqli_query($connection , $sql); 
  
      if (mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_assoc($result)) {
          $date = $row['date'];
          $activity_type = $row['activity_type'];
          $distance = $row['distance'];
          $time = $row['time'];
          $kcal = $row['kcal'];
          $note = $row['note'];
        }
      }


   
      if(isset($_POST['date'])) {

          $sql = "UPDATE tbl_activity_202 
                  SET date='".$_POST['date']."', activity_type='".$_POST['activity_type'].
                  "',distance='".$_POST['distance']."',time='".$_POST['time']."',kcal='".$_POST['kcal'].
                  "',note='".$_POST['note']."' WHERE activity_id='".$_GET['activity_id']."';";
          


          if ($connection->query($sql) === TRUE) {
             
            header('Location: progress.php');

          } else {
          echo "Error: " . $sql . "<br>" . $connection->error;
          }

          

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
      <div class="card">
        <h2>Edit an Activity</h2>

        <label  class="form-label">Activity date</label>
        <input type="date" name="date" class="form-control" value="<?php echo $date ?>" require>
        <div class="form-text">In format dd/mm/yyy</div>

        <?php

          

          $string = file_get_contents('activities.json');
          $json = json_decode($string , true);
          echo '<label  class="form-label">Activity</label>';
          echo '<select name="activity_type" class="form-select">';

          foreach($json['activityList'] as $v){

                 $selected = ""; 

                 if($v['value'] == $activity_type) {
                   $selected = " selected"; 

                 }

                echo '<option value="'.$v['value'].'"'.$selected.'>'.$v['name'].'</option>';

          }


          echo "</select>";


        ?>


        <label class="form-label">Distance:
          <input type="number" name="distance" value="<?php echo $distance ?>" placeholder="KM" class="form-control"  min="0" id="exampleInputEmail1" aria-describedby="emailHelp" require>
        </label>

        <label class="form-label">Time:</label>
        <input type="text" name="time" value="<?php echo $time ?>" placeholder="Enter time" class="form-control" require>
        <div class="form-text">In format HH:MM:SS</div>

        <label class="form-label">Kcal
          <input type="number" name="kcal" value="<?php echo $kcal ?>" placeholder="Kcal"class="form-control" min="20" id="exampleInputPassword1">
        </label>

        <label class="form-label">Note<br>
        <textarea id="w3review" name="note" rows="4" cols="35">
        <?php echo $note ?>
        </textarea>
        </label>

            <button type="submit" class="btn btn-success">Update</button>
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