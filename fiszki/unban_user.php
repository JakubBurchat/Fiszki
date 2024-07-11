<?php
    // used to delete user feedback (admin)

    include "includes.php";

    check_if_admin();

    $sql; // used for executing queries on data base

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = 'UPDATE user SET banndate = NULL, banned=0  WHERE ID=' . $_POST["userID"];
        update_to_database($sql);
        header("Location: browse_users.php");
    }
?>