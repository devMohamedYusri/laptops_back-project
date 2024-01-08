<?php session_start();
        include("connect-dp.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>update admin</title>
</head>
<body>
<?php include("navadmin.php");?>

    <div class="container">  

        <div class="dad-container">
            <h2 data-la="h2">Update admin</h2>
            <form action ="" method="post"> 
                <label for ="adminId">admin ID</label>
                <input type="text"placeholder="Enter admin ID"id="adminId" name="adminId">
                <label for ="adminName">admin User Name</label>
                    <input type="text"placeholder="Enter admin user name"id="adminName" name="adminName">
                    <label for ="First">First Name</label>
                    <input type="text"placeholder="Enter first name"id="first" name="first">
                    <label for ="last">Last Name</label>
                    <input type="text"placeholder="Enter last name"id="last" name="last">
                    <label><input type="radio" name="gender" value="male"> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                    <label for ="age">age</label>
                    <input type="number" min="2" placeholder="Enter admin name"id="age" name="age">
                    <label for ="email">email</label>
                    <input type="email"placeholder="Enter E-mail"id="email" name="email">
                    <label for ="password">Password</label>
                    <div id="password_field">
                        <input type="password" placeholder="Enter Password" id="password" name="password">
                        <img src="eye-close.png" id="eye">
                    </div>
                <button type="submit" class="sub" name="update">Update</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Filled = true;
                $requiredFields = ['adminId','adminName','first','last','gender','age','email','password']; 
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field]) || empty($_POST[$field])) {
                        $Filled = false;
                        break;
                    }
                }
                if ($Filled) {
                    $id=$_POST['adminId'];
                    $admin_name = $_POST['adminName'];
                    $firstName  = $_POST['first'];
                    $lastName   = $_POST['last'];
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
                if(isset($_POST['update']) && $done){
                    $updateadmin = "UPDATE admin 
                    SET password='$password', adminName='$admin_name',firstName='$firstName',lastName='$lastName',gender='$gender',age='$age',email='$email'WHERE ID='$id'";
                    $exist = mysqli_query($conn,"SELECT * FROM admin WHERE ID = '$id'");
                    $count=mysqli_num_rows($exist);
                    if($count)
                    {
                        $query=mysqli_query($conn,$updateadmin);
                            if($query)
                            {
                                echo "<script>alert('congratulation you updated admin successfully ');</script>";
                            }else{
                                echo "<script>alert('your request failed');</script>";
                            }
                    }else{
                        echo "<script>alert('admin ID is not exist choose another one');</script>";
                    }
                }
                ?>
        </div>
    </div>
    <script>
        var eye=document.getElementById("eye");
        var pass=document.getElementById("pass");
        eye.addEventListener("click",function (){
            if(password.type== "password"){
                pass.type="text";
                eye.src="open.png";
            }else{
                pass.type="password";
                eye.src="eye-close.png";
            }
        });
    </script>
</body>
</html>