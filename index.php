<?php
include 'connection.php';
error_reporting(0);
if (isset($_POST['register'])) {
    $filename = $_FILES['uploadfile']['name'];

    $tempname = $_FILES['uploadfile']['tmp_name'] ?? '';
    $folder = 'images/' . $filename;
    move_uploaded_file($tempname, $folder);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $position = $_POST['position'];
    $house = $_POST['house'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO form(Name,Email,Phone,Password,Position,House,Street,City,State,Gender,Image) 
    VALUES('$name', '$email','$phone', '$password','$position','$house','$street','$city','$state','$gender','$folder')";
    $result = mysqli_query($conn, $query);

    // header('Location: login.php');
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  

    <title>Form</title>
</head>
<style>
    body{
        /* background: -webkit-linear-gradient(left, #3931af, #00c6ff);
         */
        background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E1 0%, #80D0C7 70%);
    }
    .register{
    /* background: -webkit-linear-gradient(left, #3931af, #00c6ff); */
    background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E1 0%, #80D0C7 70%); 
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}

.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
.city-state{
    margin-top: 41px;
}
#img{
    width: 150px;
    height: auto;
 
}
</style>
<body >
 <form action="#" method="post" enctype="multipart/form-data">
    <div id="topDiv">

    </div>

     <div class="register">
         <div class="row ">
                    <div class="col-md-3 register-left">
                        <img src="images/logo1.png" class="img-fluid" id="img" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 1 step away from upscaling your Career!!</p>
                        <h6>Already have an account?</h6>
                        <a href="login.php" class="btn btn-warning rounded">Login</a>
                     
                    </div>
                    <div class="col-md-9 register-right ">
                      
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>
                                <!-- <h3 class="display-7 text-align-center mt-1 mb-1">Apply as a Employee</h3> -->
                                <div class="container row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group m-2">
                                            <input type="text" class="form-control" autocomplete="off" id="inputName" name="name" placeholder="First Name *"  />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control m-2" autocomplete="off" name="position" placeholder="Position *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control m-2" autocomplete="off" id="exampleInputPassword1" name="password" placeholder="Password *" />
                                        </div>
                                        <div class="address mx-3">

                                            <h6 >Address</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" class="form-control mt-1 my-2" name="house" placeholder="House *" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" class="form-control mt-1 my-2" name="street" placeholder="Street *"  />
                                            </div>
                                            <div class="mt-4 ml-4">
                                                <h6>Select image to upload:</h6>
                                        <input type="file" name="uploadfile" id="fileToUpload">
  
                                    </div>
                                    
                                    </div>
                                    
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" autocomplete="off" class="form-control m-2" id="inputName" name="email" placeholder="Your Email *" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" class="form-control m-2" id="inputEmail" name="phone" pattern="{0-9}{10}" placeholder="Your Phone *"  />
                                        </div>
                                        <div class="d-flex align-items-center ml-5 mt-4">
                                            
                                            <!-- <label class="radio inline">  -->
                                                <h6 class="justify-content-center text-align-center mt-2 mx-3">Gender*</h6>
                                                    <div class="m-2">
                                                        
                                                        <input type="radio"  name="gender" value="male"  >
                                                        <span> <i class="fa-solid fa-mars" style="color: #005eff;"></i></span> 
                                                    </div>
                                               
                                                    <div class="m-2">
                                                        
                                                        <input type="radio" name="gender" value="female">
                                                        <span><i class="fa-solid fa-venus" style="color: #ff00d0;"></i> </span> 
                                                    </div>
                                              
                                            </div>
                                            <div class="form-group city-state" >
                                            <input type="text" autocomplete="off" class="form-control m-2" name="city" placeholder="City *" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" autocomplete="off" class="form-control m-2" name="state" placeholder="State *"  />
                                            </div>
                                        
                                        <div class="d-flex justify-content-end">

                                            <button  type="submit" class="btn flex-end btn-primary mt-3" name="register">Register</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
<?php if ($result) {
    echo '

    <script>
   
    
   alert("Registration Successfull");
   window.location.href = "login.php";
    

    
    </script>';
} ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    
    
    </script>
<script src="https://kit.fontawesome.com/50b6522a75.js" crossorigin="anonymous"></script>
</form>
</body>

</html>

