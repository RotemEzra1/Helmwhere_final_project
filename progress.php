<?php
    session_start();
    include 'db.php';
    include "config.php";
    include "function.php";

    $sql = "SELECT * FROM tbl_user_activity_202 WHERE user_id='". $_SESSION["user_id"] ."'";
  
    $result = mysqli_query($connection , $sql); 
       
    $activity_arr = array();

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $activity_arr[] =$row['activity_id'];
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
    <title>Progress</title>
   
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
    <div class="main-headerProg">
      <div class="main-header__heading">
        <form>
          <?php

      $string = file_get_contents('activities.json');
      $json = json_decode($string , true);
      echo '<select name="activity_type_filter" class="form-select" onchange="this.form.submit()">';

      foreach($json['activityList'] as $v){


        $selected = ""; 

        if(isset($_GET['activity_type_filter'])) {
          
          if($v['value'] == $_GET['activity_type_filter']) {
            $selected = " selected"; 

          }
          }
          echo '<option value="'.$v['value'].'"'.$selected.'>'.$v['name'].'</option>';

      }


      echo "</select>";
      ?>
</form>

      </div>
      <div class="main-header__updates">
        <div class="mb-3">
          <div class="prog">
          <input type="date" name="dateprog" class="form-control"></input>
          </div>
      </div>
    </div>
    </div>


    <div class="main-overviewProg">
    <a class="a-plus" href="newActivity.php">
           <i class="bi bi-plus-circle-fill"></i>
    </a>
      <?php
        $activities = implode(",",$activity_arr);

        if(isset($_GET['activity_type_filter']) && $_GET['activity_type_filter'] != 0) {
          $sql = "SELECT * FROM tbl_activity_202 WHERE activity_type='".$_GET['activity_type_filter']."' AND activity_id IN(". $activities .");";
        }else {
          $sql = "SELECT * FROM tbl_activity_202 WHERE activity_id IN(". $activities .");";
        }
        

        $result = mysqli_query($connection, $sql);

        
        if($result != false){

          if (mysqli_num_rows($result) > 0) {
          // output data of each row
          echo '<div class="continer">';
          echo '<h1 class="text-center text-success">Total activities: '.count($activity_arr).'</h1>';
          
          while($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="row text-center bg-light mt-3 mb-3 p-4 align-middle" >

              <div class="col-4">
        
    
    
              <i class="bi bi-bicycle prog fa-4x"></i>
              </div>

              <div class="col-4">
              <?php echo $row['distance'] . " KM"; ?>
                <br>
                <?php echo $row['time'] ; ?>
                <br>
                <?php echo $row['kcal'] . " KCAL"; ?>


              </div>

              <div class="col-4">
              <a href="editActivity.php?activity_id=<?php echo $row['activity_id']; ?>">
                 <?php echo $row['date']; ?>
              <i class="bi bi-pencil-fill line1"></i>
              </a>
              <br>
              <a class="confirmation" href="activityDelete.php?activity_id=<?php echo $row['activity_id']; ?>" >
                            
                <i class="bi bi-trash-fill"></i>
              </a>

              </div>

            </div>
            

            <?php
          }
          echo '</div>';
        }
      }else{
        echo '<h1 class="activ-empty text-center text-success">No Activities';
        echo "</h1>";

      }

      ?>
        </div>
 
        <br><br><br><br>


      </div>

 
</div>

    <script src ="js/scripts.js"></script>
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