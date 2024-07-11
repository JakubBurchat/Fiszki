<?php

    function validate($data){ // validate input data

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    function check_if_user() { // check for access to website
        if (!isset($_SESSION["logged_in"])) {
            header("Location: start.php");
            die();
        }
    }

    function check_if_admin() { // check for access to website
        if (!isset($_SESSION["logged_in"]) || !$_SESSION['ADMIN']) {
            header("Location: start.php");
            die();
        }
    }

?>