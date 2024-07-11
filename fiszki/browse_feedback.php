<?php
    include "includes.php";

    check_if_admin();

    $sql = "SELECT feedback.topic, feedback.description, user.login, feedback.ID FROM feedback INNER JOIN user ON feedback.userID=user.id;";
    $fields = ["topic", "description", "login", "ID"];
    $array = read_data_to_array($sql, $fields);

    echo "<table>";
    echo "<tr><th>Temat</th><th>Opis</th><th>Użytkownik</th><th>DEL</th></tr>";
    
    if (count($array) > 0) {
        for ($i = 0; $i < count($array); $i += 4) {
            echo '<tr><td>'. $array[$i] .'</td><td>'. $array[$i+1] .
            '</td><td>'. $array[$i+2] .'</td><td>
            <form action="delete_feedback.php" method="post">
            <input type="submit" name="submit" value="Delete">
            <input type="hidden" id="feedbackID" name="feedbackID" value="' . $array[$i+3] . '"></form></td></tr>';
        }
    }
    echo "</table>";
?>

</body>

<style>
    <?php include 'style/browse_feedback.css'; ?>
</style>