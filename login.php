<?php
include 'connection.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
    <style>
      section{
        width: 90vw;
      
      }
      /* #img2{
    width: 200px;
    height: auto;
 
} */
      #img1{
    width: 250px;
    height: auto;
 position: absolute;
 top: 200px;
 left: 200px;
}
      #img2{
    width: 200px;
    height: auto;
 position: absolute;
 top: 30px;
 left: 230px;
}
#adminlogin{
            /* background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E1 0%, #80D0C7 70%); */
width: 150px;
margin-top: 1px;
/* text-align: center; */

        }
        h6{
          color: white;
          text-align: center;
        
        }
      body{
        background-color: linear-gradient(to right, #8360c3, #2ebf91) ;
        
      }


    </style>
</head>
<body>
<section class="vh-80">
 
  <a href="admin.php" class="btn rounded btn-primary m-3 p-2 flex-shrink-1" id="adminlogin">Admin Login</a>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="d-flex flex-col col-md-7 col-lg-6 col-xl-5" class="imgContainer">
        
          <img src="images/logo1.png" id="img2" class="img-fluid m-2 col-12" alt="">
          <br>
          <img src="images/loginImage.webp"
          class="img-fluid m-2" alt="Sample image" id="img1">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="#" method="post">
          

          <!-- Email input -->
          <div class="form-outline mb-4">
          <h3 class=" display-6 mx-2 my-3 p-3  rounded " id="emp">Employee Login</h3>
            <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
              placeholder="Enter a valid email address" required autocomplete="off"/>
            <label class="form-label" >Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg" name="password"
              placeholder="Enter password" required autocomplete="off" />
            <label class="form-label" >Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            
            <!-- <a href="#" class="text-body link-primary">Forgot password?</a> -->
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="login" value="login">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="index.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>

  
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        

</script>
</body>
</html>

<?php if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $query = "SELECT * FROM form where Email ='$email' && Password='$pwd'";

    $data = mysqli_query($conn, $query);
    $row = mysqli_num_rows($data);
    // echo $row;
    if ($row == 1) {
        //login ok
        $_SESSION['username'] = $email;
        header('location:employeeInfo.php');
    } else {
        //login failed
        echo "<script>alert('Incorrect Email or Password');</script>";
        header("Refresh:0''");
    }
}

?>
