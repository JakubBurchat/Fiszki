<!DOCTYPE html>

<html>

<head>

    <title>Rejestracja</title>

</head>

<style>
    <?php include 'style/login.css'; ?>
</style>

<?php include "includes.php"; ?>

     <form action="register.php" method="post">

        <h2>REJESTRACJA</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Nazwa użytkownika</label>

        <input type="text" name="username" placeholder="Nazwa użytkownika" <?php if(isset($_POST['username'])) { echo "value=".$_POST['username'];} ?>><br>

        <label>Hasło</label>

        <input type="password" name="password" placeholder="Hasło"><br> 
        
        <label>Potwierdź hasło</label>

        <input type="password" name="confpassword" placeholder="Hasło"><br> 
        
        <label>E-mail</label>

        <input type="email" name="mail" placeholder="E-mail" <?php if(isset($_POST['mail'])) { echo "value=".$_POST['mail'];} ?>><br> 

        <button type="submit">Rejestracja</button>
        
        <?php
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail'])) {
                $username = validate($_POST['username']);

                $password = validate($_POST['password']);

                $confpassword = validate($_POST['confpassword']);

                $mail = validate($_POST['mail']);

                if (empty($username)) {
                    echo "Nazwa użytkownika jest wymagana";
                    exit();
                }else if(empty($password)){
                    echo "Hasło jest wymagane";
                    exit();
                }else if(empty($mail)){
                    echo "E-mail jest wymagany";
                    exit();
                }else if($password != $confpassword) {
                    echo "Hasła niezgodne";
                    exit();
                }else{
                    $sql = "SELECT * FROM user WHERE login='$username' OR mail='$mail'";
                    $result = read_from_database($sql);
                    if (mysqli_num_rows($result) === 0) {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO user (login, password, mail)
                            VALUES ('$username', '$password', '$mail')";
                        insert_into_database($sql);
                        echo "Zarejestrowano!";
                        exit();
                    }else{
                        echo "Nazwa użytkownika lub e-mail są już w użyciu";
                        exit();
                    }
                }
            }
        ?>

     </form>

</body>

</html>