<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>admin List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        include("connect-dp.php");
        include("navadmin.php");

        $sql = "SELECT ID, adminName, firstName, lastName, gender, age, email, password FROM admin";
        $result = $conn->query($sql);
        $data = array();
        
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<thead><tr><th>id</th>
            <th>admin User</th>
            <th>first Name</th>
            <th>last Name</th>
            <th>gender</th>
            <th>age</th>
            <th>email</th>
            <th>password</th></tr></thead>';
            echo '<tbody>';
        
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['adminName'] . '</td>';
                echo '<td>' . $row['firstName'] . '</td>';
                echo '<td>' . $row['lastName'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<script>alert('Error')</script>";
        }
        $conn->close();
    ?>
</body>
</html>