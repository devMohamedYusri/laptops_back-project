<?php session_start();
        include("connect-dp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>admin</title>
</head>
<body>
<?php include("navadmin.php");?>
    <div class="container">  

        <div class="dad-container">
            <h2 data-la="h2">ADD admin</h2>
            <form action ="" method="post">
                <label for ="adminName">admin User Name</label>
                <input type="text"placeholder="Enter admin user name"id="adminName" name="adminName">
                <label for ="First">First Name</label>
                <input type="text"placeholder="Enter first name"id="first" name="first">
                <label for ="last">Last Name</label>
                <input type="text"placeholder="Enter last name"id="last" name="last">
                <label>
                <input type="radio" name="gender" value="male"> Male
                </label>
                <label>
                <input type="radio" name="gender" value="female"> Female
                </label>
                <label for ="age">age</label>
                <input type="number" min="2" placeholder="Enter admin name"id="age" name="age">
                <label for ="email">email</label>
                <input type="email"placeholder="Enter E-mail"id="email" name="email">

                <label for ="password">Password</label>
                <div id="password_field">
                    <input type="password" placeholder="Enter Password" id="password" name="password">
                    <img src="eye-close.png" id="eye_icon">
                </div>
                <button type="submit" class="sub" name="addadmin">ADD</button>
            </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Filled = true;
            $requiredFields = ['adminName','first','last','gender','age','email','password']; 
            foreach ($requiredFields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $Filled = false;
                    break;  
                }
            }
            if ($Filled) {
                $admin_name = $_POST['adminName'];
                $firstName = $_POST['first'];
                $lastName = $_POST['last'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $done=true;
            } else {
                echo "<script>alert('all feilds are required');</script>";
                $done=false;
            }
        }
            if(isset($_POST['addadmin']) && $done){
                $insertAdmin="insert into admin(adminName,firstName,lastName,gender,age,email,password) values ('$admin_name','$firstName','$lastName','$gender','$age','$email','$password')";
                $exist = mysqli_query($conn,"SELECT * FROM admin WHERE adminName = '$admin_name'");
                $count=mysqli_num_rows($exist);
                if($count)
                {
                    echo "<script>alert('admin name is already exist choose another one');</script>";
                }else{
                        $query=mysqli_query($conn,$insertAdmin);
                        if($query)
                        {
                            echo "<script>alert('congratulation you added admin successfully ');</script>";
                        }else{
                            echo "<script>alert('your request failed');</script>";
                        }
                }
            }
    ?>

    <script>
        var eyeimg=document.getElementById("eye_icon");
        var password=document.getElementById("password");
        eyeimg.addEventListener("click",function (){
            if(password.type== "password"){
                password.type="text";
                eyeimg.src="open.png";
            }else{
                password.type="password";
                eyeimg.src="eye-close.png";
            }
        });
    </script>
</body>
</html>