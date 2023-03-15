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

<!-- In HTML form -->
<form method="post">
    <button type="submit" name="action" value='disease'>Delete crop disease</button>
    <br /><br />
    <button type="submit" name="action" value='pest'>Delete crop pest</button>
</form>

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
