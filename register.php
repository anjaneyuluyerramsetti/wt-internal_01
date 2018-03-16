<?php
    include('server.php');
    session_start();
    if(isset($_POST['sub'])){
        $username=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="INSERT INTO `user`(`user_name`,`email`,`password`) VALUES('$username','$email','$password')";
        mysqli_query($conn,$query);
        header('location:login.php');
    }

?>
<!DOCTYPE html>
<html>
<head><script src="validate.js"></script></head>
<body>
    <h1>Registration Form</h1>
    <form method="POST" action="">
    User Name:<br><input type="text" name="name" placeholder="User Name" required><br><br>
    Email:<br><input type="email" name="email" placeholder="Your Email" required><br><br>
    Password:<br><input type="password" name="password" id="password" placeholder="password" required><br><br>
    Confirm Password:<br><input type="password" name="password1" id="confirm_password" placeholder="Confirm Password" required><br><br>
    <input type="submit" name="sub" onclick="validate()" placeholder="Register">
    </form>
</body>
</html>