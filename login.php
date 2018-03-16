<?php
    include('server.php');
    session_start();
    if(isset($_POST['login'])){
        $username=$_POST['name'];
        $password=$_POST['password'];
        $query="SELECT * FROM user WHERE user_name='$username' and password='$password'";
        $sql=mysqli_query($conn,$query);
        if(mysqli_num_rows($sql)>0){
                $_SESSION['username']=$username;
                $_SESSION['password']=$password;
                header('location:products.php');
        }
        else{
            echo $sql;
            echo "User does not exist";
        }
        
    }

?>
<!DOCTYPE html>
<html>
<body>
    <h1>Login Form</h1>
    <form method="POST" action="">
    User Name:<br><input type="text" name="name" placeholder="User Name" required><br><br>
    Password:<br><input type="password" name="password" placeholder="password" required><br><br>
    <input type="submit" name="login" placeholder="Login">
    </form>
</body>
</html>