<head>

    <title>Wyniki</title>

</head>
<style>
    <?php include 'style/scores.css'; ?>
</style>

<?php
    include "includes.php";

    check_if_user();

    $sql; // used for executing queries on data base
    $array; // stores an array of data from database to be used on displaying
    $fields; // name of the data to be stored in a array in given order

    if (isset($_POST["mode"])) {
        $sql = "SELECT date, mode, points, time, percent, live_mode, level FROM score WHERE user=" . $_SESSION['ID'] .  " AND mode=" . $_POST["mode"];
    } else {
        $sql = "SELECT date, mode, points, time, percent, live_mode, level FROM score WHERE user=" . $_SESSION['ID'];
    }
    $fields = ["date", "mode", "points", "time", "percent", "live_mode", "level"];
    $array_score = read_data_to_array($sql, $fields);
    $sql = "SELECT ID, name FROM mode";
    $fields = ["ID", "name"];
    $array_mode = read_data_to_array($sql, $fields);

    $IDs = [0]; // id of a given mode
    $Names = [0]; // name of a given mode
    for ($i = 0; $i < count($array_mode); $i += 2) {
        array_push($IDs, $array_mode[$i]);
        array_push($Names, $array_mode[$i+1]);
    }

    echo '<a href="erase_scores.php"><div id="erase_button">Reset</div></a>';
    ?>
    <form action="?" method="POST">
    <label for="mode">Wybierz Tryb:</label>
    <select id="mode" name="mode">
    <?php
        for ($i = 1; $i < count($IDs); $i++) {
            if ($_POST["mode"] == $i) {
                echo '<option value="'. $IDs[$i] .'"selected>'. $Names[$i] .'</option>';
            } else {
                echo '<option value="'. $IDs[$i] .'">'. $Names[$i] .'</option>';
            }
        }
    ?>
    </select>
    <button type="submit">Filtruj</button>
    </form>
    <?php
    echo "<table>";
    echo "<tr><th>Data</th><th>Tryb</th><th>Punkty</th><th>Procent</th><th>Czas(s)</th><th>Tryb Żyć</th><th>Poziom</th></tr>";
    if (count($array_score) > 0) {
        for ($i = 0; $i < count($array_score); $i+= 7) {
            if ($array_score[$i+6] == "easy") {
                $level = "Łatwy";
            } else if ($array_score[$i+6] == "medium") {
                $level = "Średni";
            } else if ($array_score[$i+6] == "hard") {
                $level = "Trudny";
            }
            echo "<tr><td>". $array_score[$i] ."</td><td>". $Names[$array_score[$i+1]] .
            "</td><td>". $array_score[$i+2] ."</td><td>". $array_score[$i+4] .
            "%</td><td>" . $array_score[$i+3]. "</td><td>" . (boolval($array_score[$i+5]) ? 'Tak' : 'Nie'). 
            "</td><td>" . $level . "</td></tr>";
        }
    }
    echo "</table>";
?>

</body>