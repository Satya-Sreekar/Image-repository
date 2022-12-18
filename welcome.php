<!DOCTYPE html>
<html>
    <Head>
        <title>
            You Are Now Logged in 
        </title>
        <style>
    body 
    {
        background-image: url('welcome.gif');
    }
        </style>

    </Head>
    <Body>
        <?php session_start();
        if (isset($_SESSION['UN'])) {
            echo 'Welcome ' . $_SESSION['UN'] . "<br> Logged in as " . $_SESSION['Role'];
        }
        else{
            header("location:index.php");
            exit;
        }
     ?>

    <H1><center><a href='/logout.php'>Logout</a></center><H1>
    </body>
</html>