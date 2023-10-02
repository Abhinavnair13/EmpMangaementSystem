<?php
include 'connection.php';
session_start();
if (isset($_SESSION['username'])) {
    $userEmail = $_SESSION['username'];

    if (isset($_POST['reset'])) {
        $oldpass = $_POST['oldpass'];
        $newpassword = $_POST['newpass'];

        // $useremail = $_SESSION['login'];
        $query = "UPDATE form SET Password = '$newpassword' WHERE Email = '$userEmail'";
        $query2 = "SELECT * FROM form where Email='$userEmail'";
        $newpassword = $_POST['newpass'];
        $sql = mysqli_query($conn, $query2);
        $num = mysqli_fetch_array($sql);
        // print_r($num);
        if ($oldpass == $num['Password']) {
            $sql2 = mysqli_query($conn, $query);
            echo '<script>alert(Updated Successfully);</script>';
            header('location:login.php');
        } else {
            echo '<script>alert(Incorrect Password);</script>';
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
    <title>Reset Password</title>
    <style>
        body{

            background-image: linear-gradient(to right, #b6fbff, #83a4d4);
        }
        .bgImg{
            width: 200px;
            height: 120px;
            margin-left: 530px;
            margin-top: 50px;
            z-index: 1;
        }
        .mainDiv{
            /* z-index: 3; */
            margin-top: 0px;
            margin-left: 430px;
        }
    </style>
</head>

<body>
    <img src="images/logo1.png" class="bgImg" alt="">
    <div class="mainDiv">
        <div class="d-flex  ">


            <form class=" m-5 p-5 rounded border bg-secondary-subtle w-auto" action="#" id="form" onsubmit="return valid();" method="post">
                <!-- Old password -->
                <div class="form-outline mb-4 ">
                    <input type="password" autocomplete="off" name="oldpass" class="form-control border-dark" placeholder="Current Password" id="oldpass" />

                </div>

                <!-- New Password -->
                <div class="form-outline mb-4">
                    <input type="password" autocomplete="off" name="newpass" class="form-control border-dark" placeholder="New Password" id="newpass" />

                </div>

                <!-- Confirm new password -->
                <div class="form-outline mb-4">
                    <input type="password" autocomplete="off" new="cnfnewpass" class="form-control border-dark" placeholder="Confirm New Password" id="cnfnewpass" />

                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block" name="reset">Reset Password</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">

    </script>
    <script>
        // console.log("1");

        function valid() {
            var oldPass = document.getElementById("oldpass");
            var newPass = document.getElementById("newpass");
            var cnfNewPass = document.getElementById("cnfnewpass");
            console.log("1");

            if (oldPass.value == "") {
                oldPass.focus();
                var newElement = document.createElement('p');
                newElement.textContent = 'Enter Current Password';
                newElement.classList.add('bg-warning', 'm-3', 'p-1', 'rounded'); // Add CSS class for styling

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.textContent = 'X';
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes

                // Append the close button to the message
                newElement.appendChild(closeButton);

                // Get the parent element and prepend the message
                var parentDiv = document.getElementById('form');
                parentDiv.prepend(newElement);

                // Add a click event listener to the close button
                closeButton.addEventListener('click', function() {
                    newElement.remove(); // Remove the message when the close button is clicked
                });
                oldPass.focus();

                return false;
            } else if (newPass.value == "") {
                newPass.focus();
                var newElement = document.createElement('p');
                newElement.textContent = 'Enter New Password';
                newElement.classList.add('bg-warning', 'm-3', 'p-1', 'rounded'); // Add CSS class for styling

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.textContent = 'X';
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes

                // Append the close button to the message
                newElement.appendChild(closeButton);

                // Get the parent element and prepend the message
                var parentDiv = document.getElementById('form');
                parentDiv.prepend(newElement);

                // Add a click event listener to the close button
                closeButton.addEventListener('click', function() {
                    newElement.remove(); // Remove the message when the close button is clicked
                });
                newPass.focus();
                return false;
            } else if (cnfNewPass.value == "") {
                cnfNewPass.focus();
                var newElement = document.createElement('p');
                newElement.textContent = 'Enter Confirmed Password';
                newElement.classList.add('bg-warning', 'm-3', 'p-1', 'rounded'); // AddCSS class for styling

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.textContent = 'X';
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes

                // Append the close button to the message
                newElement.appendChild(closeButton);

                // Get the parent element and prepend the message
                var parentDiv = document.getElementById('form');
                parentDiv.prepend(newElement);

                // Add a click event listener to the close button
                closeButton.addEventListener('click', function() {
                    newElement.remove(); // Remove the message when the close button is clicked
                });
                cnfNewPass.focus();
                return false;
            } else if (newPass.value != cnfNewPass.value) {
                newPass.focus();
                var newElement = document.createElement('p');
                newElement.textContent = 'New and Confirm Password Not Same` ';
                newElement.classList.add('bg-danger', 'm-3', 'p-1', 'rounded'); // Add CSS class for styling

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.textContent = 'X';
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes

                // Append the close button to the message
                newElement.appendChild(closeButton);

                // Get the parent element and prepend the message
                var parentDiv = document.getElementById('form');
                parentDiv.prepend(newElement);

                // Add a click event listener to the close button
                closeButton.addEventListener('click', function() {
                    newElement.remove(); // Remove the message when the close button is clicked
                });
                oldPass.focus();
                return false;
            }
            else if (newPass.value == oldPass.value) {
                newPass.focus();
                var newElement = document.createElement('p');
                newElement.textContent = 'Old and new Passwords are same';
                newElement.classList.add('bg-danger', 'm-3', 'p-1', 'rounded'); // Add CSS class for styling

                // Create a close button
                var closeButton = document.createElement('button');
                closeButton.textContent = 'X';
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes
                closeButton.classList.add('text-dark', 'text-align-center'); // Add CSS classes

                // Append the close button to the message
                newElement.appendChild(closeButton);

                // Get the parent element and prepend the message
                var parentDiv = document.getElementById('form');
                parentDiv.prepend(newElement);

                // Add a click event listener to the close button
                closeButton.addEventListener('click', function() {
                    newElement.remove(); // Remove the message when the close button is clicked
                });
                oldPass.focus();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>