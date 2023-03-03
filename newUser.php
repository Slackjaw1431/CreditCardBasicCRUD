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
            <main>
                <h2>New User</h2>
                <form action="index.php" method="post">
                    User Name:<br>
                    <input type="text" name="newName"><br>
                    Email address:<br>
                    <td><input type="email" name="newEmail"><br>
                    Password:<br>
                    <input type="password" name="newPass">
                    <p><input type="submit" value="Create User"></p>
                    <p><a href="signIn.php">Go Back</a></p>
                    <input type="hidden" name="sign" value="createUser">
                </form>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>
