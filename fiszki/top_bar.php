<?php

    // it's a top navbar for navigation on sites 

    echo '<body id="body">';
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { // // checking whatever a visitor should see this button
        if (isset($_SESSION["ADMIN"]) && $_SESSION["ADMIN"]) { // checking whatever a user should see feedback or admin panel (admin status)
            echo '<a href="admin_panel.php"><div id="action_button">Admin panel</div></a>';
        } else {
            echo '<a href="feedback.php"><div id="action_button">Feedback</div></a>';
        }
    }

    // buttons available for all users
    echo '<a href="start.php"><div class="topbaron">Główna</div></a>';
    echo '<a href="select_category.php?site=browse_words.php"><div class="topbaron">Przeglądaj</div></a>';

    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { // displaying navbar for visitor or user
        echo '<a href="level_selection.php"><div class="topbaron">Graj</div></a>';
        echo '<a href="scores.php"><div class="topbaron">Wyniki</div></a>';
        echo '<a href="logout.php"><div class="topbaron">Wyloguj</div></a>';
    } else {
        echo '<div class="topbarof">Graj</div>';
        echo '<div class="topbarof">Wyniki</div>';
        echo '<a href="login.php"><div class="topbaron">Zaloguj</div></a>';
    }

    echo '<div style="clear: both;"></div>'; // clear formatting for further site content
?>

<style> 
    <?php include 'style/topbar.css'; ?>
</style>