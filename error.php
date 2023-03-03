<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <title>Credit Card Accounts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="content">
            <?php include 'header.php'; ?>     
            <?php
            if (!isset($_SESSION['email'])) {
                include 'nav2.php';
            } else {
                include 'nav.php';
            }
            ?>
            <main>
                <h2>Error</h2>
                <?php echo "<p>$error_msg</p>\n"; ?>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>

