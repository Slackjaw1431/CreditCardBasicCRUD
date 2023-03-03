<?php
if (!isset($_SESSION['email']))
    header("error.php");
require_once 'PersonDB.php';
require_once 'Utility.php';
require_once 'cardDB.php';

$userID = PersonDB::getPersonID($_SESSION['email']);
$email = ($_SESSION['email']);
?>
<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <title>New User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="content">
            <?php include 'header.php'; ?>
            <?php include 'nav.php'?>
            <main>
                <form action="index.php" method="post" autocomplete="off" >
                    <table>
                        <caption><h2>Add a new Card</h2></caption>
                        <tr>
                            <td>Name: </td>
                            <td><input type="text" name="name" placeholder="Enter the Card Name" style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td><input type="text" name="address" placeholder="Enter the address" style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td>Card Number: </td>
                            <td><input type="text" name="digits" placeholder="Enter the card digits" style="text-align:center"></td>
                        </tr>
                    </table>
                    <div class="submit">
                        <input type="submit" value="Submit" style="width:70px">
                        <input type="reset" value="Reset" style="width:70px">
                        <input type="hidden" name="action" value="addCard">
                    </div>
                    <input type="hidden" name="sign" value="addCard">
                </form>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
