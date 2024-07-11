<head>

    <title>Wybór poziomu</title>

</head>

<?php
    // site for selecting level

    include "includes.php";
    check_if_user();
    echo '<a href="mode_selection.php?level=easy"><div class="mode">Łatwy</div></a>';
    echo '<a href="mode_selection.php?level=medium"><div class="mode">Średni</div></a>';
    echo '<a href="mode_selection.php?level=hard"><div class="mode">Trudny</div></a>';
?>

</body>

<style>
    <?php include 'style/select_level.css'; ?>
</style>