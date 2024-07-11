<head>

    <title>Podsumowanie</title>

</head>

<?php
    // presenting and saving final score of user

    include "includes.php";

    check_if_user();

    if ($_COOKIE["score_saved"] || !isset($_COOKIE["score_saved"])) { // check if score was already saved (in case of site refresh)
        header("Location: start.php");
    }

    if (!isset($_SESSION["score_saved_panel"])) {
        $_SESSION["score_saved_panel"] = false;
    }

    $id = $_SESSION["ID"];
    $date = date("Y-m-d H:i:s");
    $mode = $_COOKIE["mode"];
    $points = $_COOKIE["points"];
    $maxpoints = count($_SESSION['array'])/3;
    $percent = ($points / $maxpoints) * 100;
    $live_mode = $_SESSION["live_mode"];
    $level = $_SESSION["level"];

    if (!$_SESSION["score_saved_panel"]) {
        $now = new DateTime();
        $time = $now->diff($_SESSION["start"]);
        $seconds = $time->format('%s');
        $sql = "INSERT INTO score (user, date, mode, points, time, percent, live_mode, level)
        VALUES ('$id', '$date', '$mode', '$points', '$seconds', $percent, $live_mode, '$level')";
        insert_into_database($sql);
        $_COOKIE["score_saved"] = true;
        $_SESSION["score_saved_panel"] = true;
    }

    echo '<div id="score">' . $points . '/' . $maxpoints .'</div>';
?>

</body>

<style>
    <?php include 'style/summary.css'; ?>
</style>