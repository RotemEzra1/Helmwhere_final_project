<?php
    include 'function.php';
    session_start();
    if(user_login()) {

        session_unset();

    }

    header('Location: index.php');
?>

<?php
  if ($connection)
  {
    $connection->close();          
  }
?>