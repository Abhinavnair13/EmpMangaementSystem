<?php
include 'fetch.php';
error_reporting(0);
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $userEmail = $_SESSION['username'];
} else {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/50b6522a75.js" crossorigin="anonymous"></script>
<style>
  body{
    background-image: linear-gradient(to right, #b6fbff, #83a4d1);
  }
  .searchInput{
    width: 200px;
    text-align: center;

  }
  .updateBtn deleteBtn{
    width: 150px;
    
  }
</style>
</head>
<body>
    <div class="d-flex justify-content-center flex-column m-2 p-2" >
   

        <h1 class="display-4 mx-5 bg-secondary-subtle rounded p-2 d-flex justify-content-between align-items-center">Registration Data
        <a href="logout.php" class="border border-danger rounded btn btn-danger ml-auto ">LogOut</a>
        </h1>

        <div class="input-group  justify-content-end">
  <div class="form-outline mx-4">

    <input type="text"  class="form-control mx-3 searchInput" placeholder="Search By Name" id="myInput"   onkeyup="searchByName()" />
    
  </div>
  
</div>
        
      
<div class="container mt-5">
 <div class="row">
   <div class=" justify-content-center modal-lg">
   
   <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Position</th>
      <th scope="col">House</th>
      <th scope="col">Street</th>
      <th scope="col">State</th>
      <th scope="col">Gender</th>
      <th scope="col">Image</th>  
    
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php if (is_array($fetchData)) {
      $nos = 1;
      foreach ($fetchData as $data) {

          $ID = $data['id'];
          // echo "<script>alert('value od data is {$ID}')</script>";
          echo " 
       
    
   
      <tr>
      <td>" .
              $nos .
              "</td> 
      <td>" .
              $ID .
              "</td> 
    <td>" .
              $data['Name'] .
              "</td>
      <td> " .
              $data['Email'] .
              "</td>
      <td>" .
              $data['Position'] .
              "</td>
      <td>" .
              $data['House'] .
              "</td>
      <td>" .
              $data['Street'] .
              "</td>
      <td>" .
              $data['State'] .
              "</td>
      
      <td>" .
              $data['Gender'] .
              "</td>
      <td><img src='" .
              $data['Image'] .
              "' height='30px' width='30px' style='display:block; margin:0 auto;''></td>
      <td>
      <a href='update.php?id=$ID' class='border border-success rounded btn btn-success updateBtn m-1'>Update</a>

      <a href='delete.php?id=$ID' class='border border-danger rounded btn btn-danger deleteBtn m-1' id='delete');'>Delete</a>

      
      
      </td>     
      

   
      
     </tr> 
     ";
          ?>
     <?php $nos++;
      }
  } else {
       ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
  } ?>
  </tbody>
</table>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</div>

<script>


function searchByName() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;

  input = document.getElementById("myInput");
  console.log(input); 
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
       
      }
    }
  }
  
}

</script>
</body>
</html>
