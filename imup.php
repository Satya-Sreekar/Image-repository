<html>
    <head>
        <?php
            session_start ();
            require('DBinfo.php');
            if (!isset($_SESSION['UN']))
                {
                    header("location:index.php");
                    exit;
                }
        ?>
        <title>
            Image Upload
        </title>
        <link rel="stylesheet" href="imup.css">
    </head>
    <body>
    <div class='heading'>
        <button onclick="window.location.href = 'user.php';">
            &larr;
        </button>
        <center>
            <h1>
                Image Upload
            </h1>
        </center>
        <button onclick="window.location.href = 'logout.php';">Logout</button>
    </div>
            <div id="box">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <th>            
                            Image Upload
                        </th>
                        <th align="center">
                            Background   
                        </th>

                    </tr>
                    <tr> 
                        <td>
                        <div class="file-upload">
                        <div class="file-select">
                        <div class="file-select-button" id="fileName">Choose File</div>
                        <div class="file-select-name" id="noFile">No file chosen...</div> 
                        <input type="file" name="images[]" multiple>
                        </div>
                         </div>
                    </td>          
                        <td>
                        <select name="bg" id="bg">
                            <option value="Lab">Lab</option>
                            <option value="Feild">Field</option>
                            <option value="bg">With Background</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <?php
                                $c="Select ".$_SESSION['CROP']." ".$_SESSION['PORD'];
                                echo $c.'-Scientific Name';
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <select id="Efr" name="Efr">';
                                <?php
                                    $c=$_SESSION['CROP'].$_SESSION['PORD'];
                                    $C="Select * FROM $c";
                                    if ($result = $conn->query($C)) 
                                    {
                                        while ($row = $result->fetch_assoc()) 
                                        {
                                            $PName = $row["PName"];
                                            $SName = $row["SCName"];
                                            echo'<H1><option value='.$PName.$SName.'>'.$PName.'-'.$SName.'</option></h1>';
                                        }
                                        echo 
                                        '</select>
                                        </td>';
                                        $result->free();
                                    }
                                  ?>
                        </td>    
                    </tr>
                    <tr>
                        <th>
                            What is in the picture?
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select name="Desc" id="Desc">
                                <option value="part">Effected Part</option>
                                <option value="pest">Pest</option>
                            </select>
                        </td>
                        <td align="center">
                            <select id="Stage" name="Stage">';
                                <?php
                                    $c='s'.$_SESSION['CROP'].$_SESSION['PORD'];
                                    $C="Select * FROM $c";
                                    if ($result = $conn->query($C)) 
                                    {
                                        while ($row = $result->fetch_assoc()) 
                                        {
                                            $stage = $row["stages"];
                                            echo'<H1><option value='.$stage.'>'.$stage.'</option></h1>';
                                        }
                                        echo 
                                        '</select>
                                        </td>';
                                        $result->free();
                                    }
                                  ?>
                        </td>
                    </tr>
                </table>
                    <input type="submit" value="Upload Images">
            </form>
        </div>
    </body>
</html>
