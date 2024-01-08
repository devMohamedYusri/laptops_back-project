<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 15px 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #555;
            color: white;
        }

        .header a{
            position: relative;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="header"><a href="admin.php">Admin</a></div>
        <a href="updateadmin.php">update admin</a>
        <a href="adminlist.php">admin list</a>
    </div>
</body>
</html>