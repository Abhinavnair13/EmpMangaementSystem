<?php
include 'fetch.php';
error_reporting(0);
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];
    $query = "SELECT id,Name,Email,Phone,Password,Position,House,Street,City,State,Gender,Image FROM form WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);

    $userName = $data['Name'];
    $userEmail = $data['Email'];
    $userPhone = $data['Phone'];
    $userId = $data['id'];
    $userPassword = $data['Password'];
    $userGender = $data['Gender'];
    $userImage = $data['Image'];
    $userPhone = $data['Phone'];
    $userHouse = $data['House'];
    $userStreet = $data['Street'];
    $userCity = $data['City'];
    $userState = $data['State'];
    $userPosition = $data['Position'];
} else {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>

    <style>
      body{
        background-image: linear-gradient(to right, #b6fbff, #83a4d4);
      }
      .gradient-custom {
      background: #f6d365;


      background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

      background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
      }
    </style>
    <script src="https://kit.fontawesome.com/50b6522a75.js" crossorigin="anonymous"></script>
</head>
<body>

<div >

<section class="vh-100" >

    <div class="d-flex justify-content-center align-items-center h-100 ">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3 " style="border-radius: .5rem; background-color:#c2e3ea">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="<?php echo $userImage; ?>"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><?php echo $userName; ?></h5>
              <div class="d-flex justify-content-center aligb-items-center">
                <i class="fa-regular fa-user m-2"></i>
                <i class="fa-light fa-hashtag"></i>

                <h4  class="m-2"><?php echo $userId; ?></h4>
              </div>
              <p><?php echo $userPosition; ?></p>

              <div class="align-items-end"> 
                <a href="login.php">

                  <i class="fa-solid fa-right-from-bracket"></i>
                </a>
                <br>
                <a href="resetPassword.php" class="text-decoration-none">
                  Reset
                  <i class="fa-solid fa-lock"></i>
                </a>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h5 class="display-5 p-1 mt-1 mb-3 rounded border">Employee </br>Information</h5>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $userEmail; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $userPhone; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Gender</h6>
                    <p class="text-muted"><?php echo $userGender; ?></p>
                  </div>
                </div>
                <h6>Address</h6>
                <hr class="mt-0 mb-4">
                <p class="text-muted"><?php echo $userHouse; ?></p>
                <p class="text-muted"><?php echo $userStreet; ?></p>
                <p class="text-muted"><?php echo $userCity; ?>,<?php echo $userState; ?></p>
                <div class="d-flex justify-content-start ">
                  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook fa-lg mx-2"></i></a>
                  <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-lg mx-2"></i></a>
                  <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-lg mx-3"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
</section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
</body>
</html>