<?php
  include 'db.php';
  ?>

  <?php
  if(isset($_GET['activity_id'])){

    $sql = "DELETE FROM tbl_activity_202 WHERE activity_id='".$_GET['activity_id']."'";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
    } else {
      echo "Error deleting record: " . $connection->error;
    }

    $sql = "DELETE FROM tbl_user_activity_202 WHERE activity_id='".$_GET['activity_id']."'";
    echo $sql;
    if ($connection->query($sql) === TRUE) {
      header('Location: progress.php');
    } else {
      echo "Error deleting record: " . $connection->error;
    }
    

  }


?>

<?php
  if ($connection)
  {
    $connection->close();          
  }
?>