<head>

    <title>Panel Administratora</title>

</head>

<?php
    include "includes.php";

    check_if_admin();

    $sent = False;
    $export = False;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['execute'])) {
            if (isset($_FILES['csv_file']['name'])) {
                $uploaddir = '/uploads';
                $uploadfile = $uploaddir . basename($_FILES['csv_file']['name']);
                if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $uploadfile)) {
                    $file = fopen($uploadfile, 'r');
                    $sql = "INSERT INTO word (polish, english, categoryID, description) VALUES";
                    while (($line = fgetcsv($file, 1000, ';')) !== FALSE) {
                        $sql .= ' ("'.$line[0].'", "'.$line[1].'", "'.$line[2].'", "'.$line[3].'"),';
                    }
                    fclose($file);
                    $sql = rtrim($sql, ', ');
                    insert_into_database($sql);
                    $sent = True;
                }
            }
        }
        if (isset($_POST['export']) && isset($_POST['category'])) {
            $sql = "SELECT polish, english, categoryID, description FROM word WHERE categoryID='". $_POST["category"] ."'";
            $fields = ["polish", "english", "categoryID", "description"];
            $array = read_data_to_array($sql, $fields);

            $file = fopen("words.csv", "w");
            for ($i = 0; $i < count($array); $i += 4) {
                fwrite($file, "" . $array[$i]. ";" . $array[$i+1] . ";" . $array[$i+2] . ";" . $array[$i+3]. "\n");
            }
            header('Location: download.php');
            if (isset($_POST['remove'])) {
                $sql = "DELETE FROM word WHERE categoryID='". $_POST["category"] ."'";
                delete_from_database($sql);
            }
            $export = True;
        }
    }
?>
    <a href="browse_feedback.php"><div class="action" id="feedback">Feedback</div></a>
    <a href="browse_users.php"><div class="action" id="browse_users">Users</div></a>
    <form enctype="multipart/form-data" action="?" method="POST">
        <label>Plik csv ze słowami:</label>
        <input type="file" name="csv_file"></input>
        <button type="submit" name="execute">Wykonaj</button>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && $sent) {
                echo "Słowa przesłane";
            }  
        ?>
        <label for="category">Wybierz kategorię:</label>
    <select id="category" name="category">

    <?php
        if (!isset($_SESSION["logged_in"])) {
            header("Location: $site");
        }

        $sql = "SELECT id, name FROM category";
        $fields = ["id", "name"];
        $array = read_data_to_array($sql, $fields);

        for ($i = 0; $i <= count($array)/2-1; $i++) {
            echo '<option value="'. $array[$i*2] .'">'. $array[$i*2+1] .'</option>';
        }
        echo "</select>";
    ?>

    <label>Usuń słowa w kategorii z bazy:</label>
    <input id="checkbox" type="checkbox" name="remove" value="remove">
    <button type="submit" name="export">Wyeksportuj</button>
    </form>

</body>

<style>
    <?php include 'style/admin_panel.css'; ?>
</style>