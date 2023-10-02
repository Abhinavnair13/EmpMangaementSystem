<?php

include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM form WHERE id=$id";
    $data = mysqli_query($conn, $query);
    if ($data) {
        echo " 
  <script> alert('Data Deleted Successfully' ); </script>";
    } else {
        echo " 
  <script> alert('Error deleting record: ' . mysqli_error($conn)' ); </script>";
    }
} else {
    header('Location : login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv = "refresh" content = "0; url = http://localhost/php_first/displayTable.php" />
</html>
