<?php
    // used to download data from server (admin)

    include "includes.php";

    check_if_admin();  

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='. "words.csv");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("words.csv"));
    readfile("words.csv");

?>