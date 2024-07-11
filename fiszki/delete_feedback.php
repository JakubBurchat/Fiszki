<?php
    // used to delete user feedback (admin)

    include "includes.php";

    check_if_admin();

    $sql; // used for executing queries on data base

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "DELETE from feedback WHERE ID=". $_POST['feedbackID'];
        delete_from_database($sql);
        header("Location: browse_feedback.php");
    }
?>