<head>

    <title>Przeglądanie użytkowników</title>

</head>

<?php
    include "includes.php";

    check_if_admin();

    $sql = "SELECT login, mail, admin, banned, banndate, ID FROM user";
    $fields = ["login", "mail", "admin", "banned", "banndate", "ID"];
    $array = read_data_to_array($sql, $fields);

    echo "<table>";
    echo "<tr><th>Login</th><th>Mail</th><th>Admin</th><th>Banned</th><th>Bandate</th><th>Ban</th><th>Unban</th></tr>";
    
    if (count($array) > 0) {
        for ($i = 0; $i < count($array); $i += 6) {
            echo '<tr><td>'. $array[$i] .'</td><td>'. $array[$i+1] .
            '</td><td>'. (boolval($array[$i+2]) ? 'true' : 'false') . '</td><td>' . (boolval($array[$i+3])? 'true' : 'false') . 
            '</td><td>' . $array[$i+4] . '</td><td> 
            <form action="bann_user.php" method="post">
            <input type="submit" name="submit" value="Ban">
            <input type="hidden" id="userID" name="userID" value="' . $array[$i+5] . '"></form></td><td> 
            <form action="unban_user.php" method="post">
            <input type="submit" name="submit" value="Unban">
            <input type="hidden" id="userID" name="userID" value="' . $array[$i+5] . '"></form></td></tr>';
        }
    }
    echo "</table>";
?>

</body>

<style>
    <?php include 'style/browse_feedback.css'; ?>
</style>