<head>

    <title>Wybieranie słów</title>

</head>

<?php
    include "includes.php";

    check_if_user();

    $numberofwords = 10; // number of words in this mode
    $index; // index of currently displayed word
    $sql; // used for executing queries on data base
    $array; // stores an array of data from database to be used on displaying
    $fields; // name of the data to be stored in a array in given order
    $points; // current points
    $correct; // index of correct answear
    $answearArray; // table of currently chosen words for user choice

    if (!isset($_SESSION['array'])) {
        if (isset($_POST["category"])) {
            $sql = "SELECT polish, english, description FROM word WHERE categoryID='". $_POST["category"] ."'";
        } else {
            $sql = "SELECT polish, english, description FROM word";
        }
        $fields = ["polish", "english", "description"];
        $tmparray = read_data_to_array($sql, $fields);
        $keyarray = [];
        for ($i = 0; $i <= count($tmparray)/3-1; $i++) {
            array_push($keyarray, $i);
        }
        shuffle($keyarray);
        if ($_SESSION["live_mode"] == 0) {
            $indexarray = array_rand($keyarray, $numberofwords);
        } else {
            $indexarray = $keyarray;
        }
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
    $maxindex = count($array)/3-1;
    $index = $_SESSION["index"];
    $_SESSION["index"] += 1;
    $points = $_COOKIE["points"];
    $lives = $_COOKIE["lives"];
    $score_saved = $_COOKIE["score_saved"];
    $answearArray = range(0, $maxindex);
    shuffle($answearArray);
    $correct = rand(0,3);
    $key = array_search($index, $answearArray);
    array_swap($answearArray, $correct, $key);

    if ($_COOKIE["score_saved"] == false) {
        setcookie("score_saved", 0);
        header("summary.php");
    }

    if (isset($_SESSION["live_mode"]) && $_SESSION["live_mode"] == 1) {
        echo '<div id="score">Punkty: ' . $points . '/' . count($_SESSION['array'])/3 . '<br>Życia: ' . $lives  .'</div>';
    } else {
        echo '<div id="score">Punkty: ' . $points . '/' . $numberofwords .'</div>';
    }
    echo '<div id="next"></div>';
    echo '<div id="word">' . $array[$index*3] . '</div>';
    echo '<div style="clear: both;"></div>';
    echo '<div id="ans0" class="answear" style="float: left;" onclick="checkIfCorrect(0)">'. $array[$answearArray[0]*3+1] .'</div>';
    echo '<div id="ans1" class="answear" style="float: left; margin-left: 5vw;" onclick="checkIfCorrect(1)">'. $array[$answearArray[1]*3+1] .'</div>';
    echo '<div style="clear: both;"></div>';
    echo '<div id="ans2" class="answear" style="float: left;" onclick="checkIfCorrect(2)">'. $array[$answearArray[2]*3+1] .'</div>';
    echo '<div id="ans3" class="answear" style="float: left; margin-left: 5vw;" onclick="checkIfCorrect(3)">'. $array[$answearArray[3]*3+1] .'</div>';
    echo '<div style="clear: both;"></div>';
    echo '<div id="description" onclick="showDescription()">' . $array[$index*3+2] . '</div>';

    // pass data to javascript
    pass_data_to_javascript(["points", "maxindex", "cindex", "hint", "correct", "lives", "score_saved", "live_mode"], [$points, $maxindex, $index, "false", $correct, $lives, $score_saved, $_SESSION["live_mode"]]);
    pass_data_to_javascript_strings(["polish", "english"], [$array[$index*3], $array[$index*3+1]]);
?>

</body>

<style>
    <?php include 'style/select_word.css'; ?>
</style>

<script type="text/javascript" src="javascript/common.js"></script>
<script type="text/javascript" src="javascript/select_word.js"></script>