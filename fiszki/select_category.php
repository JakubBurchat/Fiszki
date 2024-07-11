<head>

    <title>Wybór kategorii</title>

</head>

<?php
    include "includes.php";

    if (!isset($_SESSION["logged_in"])) {
        header("Location: " . $_GET['site']);
        die();
    } 

    $site = $_GET['site'];

    $sql = "SELECT id, name FROM category";
    $fields = ["id", "name"];
    $array = read_data_to_array($sql, $fields);

    if (isset($_SESSION['array'])) {
        unset($_SESSION['array']);
    }
    if (isset($_SESSION['index'])) {
        unset($_SESSION['index']);
    }
    if (isset($_SESSION["score_saved_panel"])) {
        unset($_SESSION["score_saved_panel"]);
    }


    if (isset($_SESSION["level"])) {
        if ($_SESSION["level"] == "easy") {
            $_SESSION["live_mode"] = 0;
        }
        if ($_SESSION["level"] == "medium") {
            $_SESSION["live_mode"] = 1;
            $_SESSION["lives"] = 3;
        }
        if ($_SESSION["level"] == "hard") {
            $_SESSION["live_mode"] = 1;
            $_SESSION["lives"] = 1;
        }
    }

    setcookie("points", 0);
    setcookie("score_saved", true);
    if ($site == "write_word.php") {
        setcookie("mode", 1);
    }
    if ($site == "select_word.php") {
        setcookie("mode", 2);
    }
?>
<form action="<?php echo $site ?>" method="POST">
<label for="category">Wybierz kategorię:</label>
<select id="category" name="category">
<?php
    for ($i = 0; $i <= count($array)/2-1; $i++) {
        echo '<option value="'. $array[$i*2] .'">'. $array[$i*2+1] .'</option>';
    }

?>
</select>
    <button type="submit">Zatwierdź</button>
</form>

</body>

<style>
    <?php include 'style/select_category.css'; ?>
</style>