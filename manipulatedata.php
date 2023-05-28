<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $_SESSION['action'] = $_POST['action'];
        if ($_POST['action'] === 'disease') {
            header("Location: deletecropdisease.php");
            exit;
        } else if ($_POST['action'] === 'pest') {
            header("Location: deletecroppest.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Crop</title>
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
            text-align: center; /* Align buttons to center horizontally */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-button {
            display: block;
            margin: 10px auto; /* Center buttons vertically */
            padding: 10px 20px;
            font-size: 16px;
            background-color: rgba(74, 174, 78, 253);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-button:hover {
            background-color: rgba(74, 174, 78, 0.8);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Crop</h1>
        <form method="post">
            <button type="submit" name="action" value="disease" class="form-button">Delete Crop Disease</button>
            <br /><br />
            <button type="submit" name="action" value="pest" class="form-button">Delete Crop Pest</button>
        </form>
    </div>
</body>
</html>

<!-- In deletecropdisease.php and deletecroppest.php -->
<?php
if (isset($_SESSION['action'])) {
    $action = $_SESSION['action'];
    if ($action === 'disease') {
        // handle delete crop disease
    } else if ($action === 'pest') {
        // handle delete crop pest
    }
    unset($_SESSION['action']);
}
?>
