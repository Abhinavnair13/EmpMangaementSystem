<?php
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    if ($user == true) {
    } else {
        header('location:login.php');
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM form WHERE id = '$id'";

    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $genderOld = $data['Gender'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $filename = $_FILES['uploadfile']['name']; //new image
        $tempname = $_FILES['uploadfile']['tmp_name'] ?? '';
        $folder = 'images/' . $filename;
        move_uploaded_file($tempname, $folder);

        if ($filename == null) {
            $folder = $data['Image'];
        }

        $query = "UPDATE form set Name = '$name',Email ='$email', Gender = '$gender',Image = '$folder' WHERE id='$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "
     
      <script> alert('Data Inserted Successfully' ); </script>"; ?>
  
  <meta http-equiv = "refresh" content = "0; url = displayTable.php" />
  <?php
        } else {
            echo "
      <script> alert('Data Updated Successfully' ); </script>
    
      ";
        }
    }
} else {
    header('Location : login.php');
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
    <title>Form</title>
</head>
<body class="bg-light mx-3 my-3 px-3 py-3">
    <div class="form m-2 p-2 d-flex justify-content-center rounded border bg-secondary-subtle   ">

    <form class="mx-3 my-3" action="#" method="post" enctype="multipart/form-data">

    <h1 class="display-4 p-1 mt-1 mb-3 rounded border ">Update Details</h1>  
  <div class="mb-3">
  <label  class="form-label">Edit Name</label>
    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo "$data[Name]"; ?>">
    <label for="exampleInputEmail1" class="form-label">Edit Email </label>
    <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo "$data[Email]"; ?>">
    
  </div>
  
<div class ="mb-3">
<label  class="form-label">Gender</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="male"
  <?php if ($data['Gender'] == 'male') {
      echo 'checked';
  } ?>
  >Male
  
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="female" 
  <?php if ($data['Gender'] == 'female') {
      echo 'checked';
  } ?>
  >Female
 
</div>
</div>
<div class="mb-3">
Select image to Update:
  <input type="file" name="uploadfile" id="fileToUpload"  >
 
  
</div>

  <button type="submit" class="btn btn-success" name="update" 
    >Update</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        
    </script>
</body>
</html>