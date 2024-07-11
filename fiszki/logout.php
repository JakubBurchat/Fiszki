<head>

    <title>Wylogowanie</title>

</head>

<?php
    // user logout

    include "includes.php";

    if (isset($_SESSION["logged_in"]) and $_SESSION["logged_in"]) {
        session_destroy();
        header("Refresh:0");
    }
    echo '<div id="word">Wylogowano</div>';
?>

</body>

<style>
    <?php include 'style/logout.css'; ?>
</style>