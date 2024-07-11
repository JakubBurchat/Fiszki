<head>

    <title>Reset Wyników</title>

</head>

<?php
    include "includes.php";

    check_if_user();

    $sql; // used for executing queries on data base

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "DELETE FROM score WHERE user=" . $_SESSION['ID'];
        delete_from_database($sql);
        echo '<div id="word">Zresetowano</div>';
    } else {
        echo '<div id="word">CZY NA PEWNO?</div>';
        echo '<form action="?" method="POST">';
        echo '<button id="Accept" type="submit">TAK</button>';
        echo '</form>';
    }
?>

</body>

<style>
    <?php include 'style/erase_scores.css'; ?>
</style>