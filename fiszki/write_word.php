<head>

    <title>Wpisywanie słów</title>

</head>

<?php
    include "includes.php";

    check_if_user();

    $numberofwords = 5; // number of wwords in this mode
    $index; // index of currently displayed word
    $sql; // used for executing queries on data base
    $array; // stores an array of data from database to be used on displaying
    $fields; // name of the data to be stored in a array in given order
    $points; // current points

    if (!isset($_SESSION['array'])) {
        if (isset($_POST["category"])) {
            $sql = "SELECT polish, english, description FROM word WHERE categoryID='". $_POST["category"] ."'";
        } else {
            $sql = "SELECT polish, english, description FROM word";
        }
        $fields = ["polish", "english", "description"];
        $tmparray = read_data_to_array($sql, $fields);
        $keyarray = [];
        for ($i = 0; $i <= count($tmparray)/4-1; $i++) {
            array_push($keyarray, $i);
        }
        shuffle($keyarray);
        $indexarray = array_rand($keyarray, $numberofwords);
        shuffle($indexarray);
        $array = [];
        foreach ($indexarray as $ind) {
            array_push($array, $tmparray[$ind*3], $tmparray[$ind*3+1], $tmparray[$ind*3+2]);
        }
        $_SESSION['array'] = $array;
    } else {
        $array = $_SESSION['array'];
    }

    if (!isset($_SESSION["index"])) {
        $_SESSION["index"] = 0;
        $_SESSION["start"] = new DateTime();
        unset($_COOKIE["lives"]);
        $_COOKIE["lives"] = $_SESSION["lives"];
    }
    if (!isset($_COOKIE["score_saved"])) {
        $_COOKIE["score_saved"] = True;
    }
    if (!isset($_COOKIE["points"])) {
        $_COOKIE["points"] = 0;
    }
    $lives = $_COOKIE["lives"];
    $score_saved = $_COOKIE["score_saved"];
    $maxindex = count($array)/3-1;
    $index = $_SESSION["index"];
    $_SESSION["index"] += 1;
    $points = $_COOKIE["points"];

    if ($_COOKIE["score_saved"] == false) {
        setcookie("score_saved", 0);
        header("summary.php");
    }
    
    if (isset($_SESSION["live_mode"]) && $_SESSION["live_mode"] == 1) {
        echo '<div id="score">Punkty: ' . $points . '/' . count($_SESSION['array'])/3 . '<br>Życia: ' . $lives  .'</div>';
    } else {
        echo '<div id="score">Punkty: ' . $points . '/' . $numberofwords .'</div>';
    }
    echo '<div id="word">' . $array[$index*3] . '</div>';
    echo '<div style="clear: both;"></div>';
    echo '<div id="answear"><label for="Answear">English:</label>';
    echo '<input type="text" id="fname" name="fname"></div>';
    echo '<div id="show_description2" class="show_description2" onclick="checkIfCorrect()">Sprawdź</div>';
    echo '<div id="description" onclick="showDescription()">' . $array[$index*3+2] . '</div>';

    // pass data to javascript
    pass_data_to_javascript(["points", "maxindex", "cindex", "hint", "lives", "score_saved", "live_mode"], [$points, $maxindex, $index, "false", $lives, $score_saved, $_SESSION["live_mode"]]);
    pass_data_to_javascript_strings(["polish", "english"], [$array[$index*3], $array[$index*3+1]]);
?>

</body>

<style>
    <?php include 'style/write_word.css'; ?>
</style>

<script type="text/javascript" src="javascript/common.js"></script>
<script type="text/javascript" src="javascript/write_word.js"></script>