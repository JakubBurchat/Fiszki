<head>

    <title>Feedback</title>

</head>

<?php
    include "includes.php";

    check_if_user();

    $sql; // used for executing queries on data base
    $id; // current user id
    $description; // description given by user
    $topic; // topic given by user

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_SESSION["ID"];
        $description = validate($_POST["description"]);
        $topic = validate($_POST["topic"]);
        $sql = "INSERT INTO feedback (userID, description, topic)
        VALUES ('$id', '$description', '$topic')";
        insert_into_database($sql);
    }
?>

    <form action="?" method="POST">
    <label>Temat:</label>
    <input type="text" name="topic" maxlength="50"></input>
    <label>Treść:</label>
    <textarea id="desc" type="text" name="description" maxlength="500"></textarea>
    <button type="submit" >Wyślij feedback</button>
    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Feedback wysłany. Dziękujemy";
      }  
    ?>
    </form>
</body>

<style>
    <?php include 'style/feedback.css'; ?>
</style>