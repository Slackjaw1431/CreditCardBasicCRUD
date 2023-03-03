<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <title>Credit Card Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="content">
<?php include 'header.php'; ?>
            <main>
                <h2>Sign In</h2>
                <form action="index.php" method="post" autocomplete="off" >
                    User ID: <br>
                    <input type="text" name="id"><br>
                    <input type="submit" value="Sign In">
                    <input type="hidden" name="sign" value="verifyUser" >
                </form>
                <p>Not signed up yet?&nbsp;<a href="newUser.php">Create new User</a></p>
            </main>
<?php include 'footer.php'; ?>
        </div>
    </body>
</html>
