<head>

    <title>Wybór trybu</title>

</head>

<?php
    // site for selecting game mode
    include "includes.php";
    check_if_user();
    $_SESSION["level"] = $_GET["level"];
    echo '<a href="select_category.php?site=write_word.php"><div class="mode">Wpisywanie</div></a>';
    echo '<a href="select_category.php?site=select_word.php"><div class="mode">Wybieranie</div></a>';
?>

</body>

<style>
    <?php include 'style/select_mode.css'; ?>
</style>