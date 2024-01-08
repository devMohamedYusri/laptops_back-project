<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>sign up</title>
</head>
<body>
    <div class="container">  

        <div class="dad-container">
            <h2 data-la="h2">Register</h2>
            <form action ="" method="post">
                <label for ="username">User Name</label>
                <input type="text"placeholder="Enter User name"id="username" name="userName">

                <label for ="firstName" >First Name</label>
                <input type="text"placeholder="Enter first name"id="firstName" name="firstname">
                
                <label for ="e_mail" >E-mail</label>
                <input type="email"placeholder="Enter Email"id="e_mail" name="email">
                
                <label for ="password" >Password</label>
                <input type="password" placeholder="Enter Password" id="password" name="passwords">
                <button type="submit" class="sub" name="register" data-la="register">Register</button>
                
                <div class="sign-up">
                    <span>Have an account? <a href="login.php">Log in</a> </span>
                </div>
            </form>
        </div>
        <?php
    include('connect-dp.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Filled = true;
            $requiredFields = ['userName', 'firstname','email','passwords']; 
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $Filled = false;
                    break;  
                }
            }
            if ($Filled) {
                $username = $_POST['userName'];
                $firstname = $_POST['firstname'];
                $email = $_POST['email'];
                $password = $_POST['passwords'];
                $done=true;
            } else {
                echo "<script>alert('all feilds are required');</script>";
                $done=false;
            }  
        }
        if(isset($_POST['register']) && $done){
            $insertUser="insert into users(userName,firstName,email,password) values ('$username','$firstname','$email','$password')";
            $exist = mysqli_query($conn,"SELECT * FROM users WHERE userName = '$username'");
            $exist2 = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
            $count=mysqli_num_rows($exist);
            $count2=mysqli_num_rows($exist2);
            if($count)
            {
                echo "<script>alert('user name is already exist choose another one');</script>";
            }else{
                if($count2){
                    echo "<script>alert('email is already exist choose another one');</script>";
                }else{
                    $query=mysqli_query($conn,$insertUser);
                    $_SESSION['name']=$firstname;
                    if($query)
                    {
                        echo "<script>alert('congratulation you signed up successfully ');</script>";
                        header("location: login.php");
                    }else{
                        echo "<script>alert('your request failed');</script>";
                    }
                }
            }
        }
        ?>
<script src="login.js"></script>
</body>
</html>