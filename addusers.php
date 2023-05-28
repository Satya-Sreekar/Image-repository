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
            align-content: center;
        }

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
        <form action="uploadusers.php" method="POST">
            <select id="usertype" name="usertype">
                <option value="User">User</option>
                <option value="Approver">Approver</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
