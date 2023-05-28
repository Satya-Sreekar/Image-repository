<?php
session_start();
if (!isset($_SESSION['UN'])) {
    header("location:index.php");
    exit;
}
require('DBinfo.php');

$_SESSION['usertype'] = $_POST['usertype'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>ADD USERS</title>
    <style>
        body {
            background: cornsilk;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            border: 2px solid rgba(72, 172, 76, 251);
            background-color: whitesmoke;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            margin-bottom: 20px;
            appearance: none;
            padding: 10px;
            border: 1px solid #999;
            border-radius: 5px;
            width: 200px;
            background-color: white;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #555;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4AAF4E;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #429843;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Users</h1>
        <form action="submitusers.php" method="POST">
            <label for="Uid">ID:</label>
            <input type="text" name="Uid" id="Uid" pattern="[a-zA-Z0-9]+" required>

            <label for="pwd">Password:</label>
            <input type="text" name="pwd" id="pwd" pattern="[a-zA-Z0-9]+" required>

            <?php
            if ($_SESSION['usertype'] == 'Approver') {
                echo '
                    <label for="spz">Specialisation:</label>
                    <select id="spz" name="spz">
                        <option value="castordisease">Castor disease</option>
                        <option value="castorpest">Castor Pests</option>
                        <option value="sunflowerdisease">Sunflower diseases</option>
                        <option value="sunflowerpest">Sunflower pests</option>
                        <option value="safflowerdisease">Safflower disease</option>
                        <option value="safflowerpest">Safflower pest</option>
                        <option value="sesamedisease">Sesame disease</option>
                        <option value="sesamepest">Sesame pest</option>
                        <option value="linseeddisease">Linseed disease</option>
                    </select>
                ';
            }
            ?>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
