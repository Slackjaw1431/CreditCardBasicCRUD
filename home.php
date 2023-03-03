<!DOCTYPE html>

<?php
/**
 * Description of cardDB
 *
 * @author talha
 */
if (!isset($_SESSION['email']))
    header("error.php");

require_once 'PersonDB.php';
require_once 'Utility.php';
?>
<html>
    <head>
        <title>Credit Cards</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="content">
            <?php include 'header.php'; ?>
            <?php include 'nav.php'; ?>
            <main>
                <table id="list">
                    <caption><h2>My Cards</hr></caption>
                    <thead>
                        <tr> 
                            <th>ID</th>
                            <th>Card Name</th>
                            <th>Address</th>
                            <th>Digits</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                        $select_db = mysqli_select_db($conn, 'project2') or die(mysqli_error($conn));

                        $userID = $userID;

                        $sql = "SELECT * FROM cards where userID = $userID";
                        $sn = 0;

                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if ($result == true) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $cardID = $row['id'];
                                $sn++;
                                $name = $row['cardName'];
                                $address = $row['address'];
                                $cards = $row['digits'];
                                ?>
                                <tr>
                                    <td><?php echo $sn ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $address ?></td>
                                    <td><?php echo $cards ?></td>
                            <form name='actions' method='post' action='index.php'>
                                <input type="hidden" name="sign" value="edit">
                                <td><button type = "submit" name="cardID" value='<?php echo $cardID; ?>'>Update</button></a></td>
                            </form>
                            <form name='actions' method='post' action='index.php'>
                                <input type="hidden" name="sign" value="delete">
                                <td><button class= "delete" type="submit" name="cardID" value="<?php echo $cardID; ?>">Delete</button></td>
                                </tr>
                            </form>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <!-- <p><a href = 'index.php?action=add'><button class="add" type='submit' action='add'>Add a Card</button></a></p>-->
                <form name='actions' method='post' action='index.php'>
                    <input type="hidden" name="sign" value="delete">
                    <td><button class= "add" type="submit" name="sign" value="add">Add a Card</button></td>
                    </tr>
                </form>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
