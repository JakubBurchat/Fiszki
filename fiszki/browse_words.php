<head>

    <title>Przeglądanie słów</title>

</head>

<?php
    include "includes.php";

    $index; // index of currently displayed word
    $sql; // used for executing queries on data base
    $array; // stores an array of data from database to be used on displaying
    $fields; // name of the data to be stored in a array in given order

    if (!isset($_GET["index"])) { // set up index 
        $_GET["index"] = 0;
    }

    if (!isset($_SESSION['array'])) { // set up array of data in case of it missing
        if (isset($_POST["category"])) {
            $sql = "SELECT polish, english, description FROM word WHERE categoryID='". $_POST["category"] ."'";
        } else {
            $sql = "SELECT polish, english, description FROM word";
        }
        $fields = ["polish", "english", "description"];
        $array = read_data_to_array($sql, $fields);
        $_SESSION['array'] = $array;
    } else { // read array from session
        $array = $_SESSION['array'];
    }

    $index = $_GET["index"]; // get desired index

    if (count($array) > 0) { // display UI, if data is present
        if ($index > 0) {
            echo '<a href="?index='. $index-1 .'"><div id="change_word1">Poprzednie Słowo</div></a>';
            echo '<div id="word" onclick="changeText()">' . $array[$index*3] . '</div>';
        } else {
            echo '<div id="word" onclick="changeText()" style="margin-left: 35.0vw;">' . $array[$index*3] . '</div>';
        }
        if ($index < count($array)/3-1) {
            echo '<a href="?index='. $index+1 .'"><div id="change_word2">Następne Słowo</div></a>';
        }
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
            echo '<div style="clear: both;"></div>';
            echo '<div id="description" onclick="showDescription()">' . $array[$index*3+2] . '</div>';
        }
        echo "\n<script>var polish =" . '"' . $array[$index*3] . '"' . " ;</script>";
        echo "\n<script>var english =" . '"' . $array[$index*3+1] . '"' ." ;</script>";
    } else { // display message in case of missing data
        echo "Brak danych";
    }

?>

</body>

<style>
    <?php include 'style/browse_words.css'; ?>
</style>

<script type="text/javascript" src="javascript/common.js"></script>