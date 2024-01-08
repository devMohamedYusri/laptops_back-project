<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="dad-container">
            <h2>Log in</h2>
            <form action ="" method="post">
                <label for ="username">username</label>
                <input type="text" placeholder="enter your username" name="username"id="username">

                <label for ="password">password</label>
                <input type="password" placeholder="enter your password" name="password"id="password">

                <span>forgot password?</span>
                <input type="submit" name ="login"class="sub" value="LOGIN">
            </form>
            <div class="sign-up">
                <span>Or sign up using </span>
                <a href="register.php">SIGN UP</a>
            </div>
        </div>
    </div>

    <?php
    include('connect-dp.php');
    $done=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['password']) || !empty($_POST['password']) || isset($_POST['username']) || !empty($_POST['username'])) {
            $name = $_POST['username'];
            $pass = $_POST['password'];
            $done = true;
        }
    }
    if($done && isset($_POST['login'])){
        $exist=mysqli_query($conn,"SELECT * FROM users WHERE userName='$name' or email='$name'");
        $exist1 = mysqli_query($conn,"SELECT * FROM admin WHERE adminName = '$name' or email='$name'");
        $count1=mysqli_num_rows($exist1);
        $count=mysqli_num_rows($exist);
        if($count==1)
        {
            $passo = mysqli_query($conn, "SELECT password FROM users WHERE userName='$name' or email='$name'");
                if (mysqli_num_rows($passo) > 0) {
                    $row = mysqli_fetch_assoc($passo);
                    $storedPassword = $row['password'];
                    if($storedPassword==$pass)
                    {
                        $namee = mysqli_query($conn, "SELECT firstName FROM users WHERE userName='$name' or email='$name'");
                        if(mysqli_num_rows($namee)>0){
                            $got=mysqli_fetch_assoc($namee);
                            $storedname=$got['firstname'];
                        }
                            $_SESSION['name']=$storedname;
                            header('Location: index.html');
                            exit;
                    }else{
                        echo "<script>alert('invalid password');</script>";
                }
            }
        }else{
            if($count1==1)
            {
                $passoadmin = mysqli_query($conn, "SELECT password FROM admin WHERE adminName='$name' or email='$name'");
                    if (mysqli_num_rows($passoadmin) > 0) {
                        $row = mysqli_fetch_assoc($passoadmin);
                        $storedPassword = $row['password'];
                        if($storedPassword==$pass)
                        {
                                $_SESSION['name']=$storedname;
                                header('Location: admin.php');
                                exit;
                        }else{
                            echo "<script>alert('invalid password');</script>";
                    }
                }
            }else{
        echo "<script>alert('invalid name or email choose another one');</script>";
        }
    }
}
    ?>
</body>
</html>