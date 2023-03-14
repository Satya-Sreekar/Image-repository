<?php
session_start ();
if (!isset($_SESSION['UN']))
{
    header("location:index.php");
    exit;
}
    require('DBinfo.php');


$_SESSION['usertype']=$_POST['usertype'];
echo "Enter details of" . $_SESSION['usertype'] . ":";

?>


<html>
<head>
</head>

<body>
<form action='/submitusers.php' method='POST'>
        <div>
            <label for="Uid">ID:</label>
            <input type="text" name="Uid" id="Uid" pattern="[a-zA-Z0-9]+" required>
        </div>
        
        <div>
            <label for="pwd">Password:</label>
            <input type="password" name="pwd" id="pwd" pattern="[a-zA-Z0-9]+" required>
        </div>
        <?php
        if($_SESSION['usertype'] == 'Approver'){
            echo
            '<div>
                <select id="spz" name="spz">Specialisation:</label>
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
            </div>';
        }
        ?>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>

</html>