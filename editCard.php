<!DOCTYPE html>
<html>
    <?php
    if (!isset($_SESSION['email']))
        header("error.php");

    require_once 'PersonDB.php';
    require_once 'Utility.php';

    $userID = PersonDB::getPersonID($_SESSION['email']);
    $email = ($_SESSION['email']);
    $cardID = $cardID;
    
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Update Card Information</title>        
        <link rel="stylesheet" type="text/css" href="style.css">
    <header>
    </header>
</head>
<body>
    <div class="content">
        <?php include 'header.php' ?>
        <?php include 'nav.php' ?>
        <form id="update" method="post" action="index.php">
            <?php
            ?>
            <table>
                <caption><h2>Form</h2></caption>
                <tr>
                    <td>New Name: </td>
                    <td><input type="text" name="name" placeholder="Enter Your Name" style="text-align:center"></td>
                </tr>
                <tr>
                    <td>New Address: </td>
                    <td><input type="text" name="address" placeholder="Enter Your Address" style="text-align:center"></td>
                </tr>
                <tr>
                    <td>New Card Number: </td>
                    <td><input type ="text" name="digits" placeholder="Enter new card number" style="text-align:center"></td>
                </tr>
            </table>
            <div class='submit'>
                <input type="submit" name="submit" value="Submit" style="width:70px">
                <input type="reset"  name="reset" value="Reset" style="width:70px">
                <input type="hidden" name="sign" value="editCard">
                <input type="hidden" name="cardID" value='<?php echo $cardID; ?>'>
            </div>
        </form>
        <?php include 'footer.php' ?>
    </div>
</body>
</html>