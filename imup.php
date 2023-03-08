<html>
    <head>
        <?php
        session_start ();
        if (!isset($_SESSION['UN']))
        {
            header("location:index.php");
            exit;
        }
        ?>
        <title>
            image Upload
        </title>
        <link rel="stylesheet" href="imup.css">
    </head>
    <body>
        <center><h1>Image Upload</h1></center>
        <div id="box">
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple>
        <input type="submit" value="Upload Images">
         </form>
          </div>
    </body>
</html>