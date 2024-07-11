<!DOCTYPE html>

<html>

<head>

    <title>Logowanie</title>

</head>

<style>
    <?php include 'style/login.css'; ?>
</style>

<?php include "includes.php"; ?>

     <form action="login.php" method="post">

        <h2>LOGOWANIE</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Nazwa użytkownika</label>

        <input type="text" name="username" placeholder="Nazwa użytkownika"><br>

        <label>Hasło</label>

        <input type="password" name="password" placeholder="Hasło"><br> 

        <button type="submit">Zaloguj się</button>

        <p>Nie masz konta. <a href="register.php">Zarejestruj się</a></p>
        
        <?php
            if (isset($_SESSION['logged_in'])) {
                echo "Zalogowano!";
            }
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = validate($_POST['username']);

                $password = validate($_POST['password']);

                if (empty($username)) {
                    echo "Nazwa użytkownika jest wymagana";
                    exit();
                }else if(empty($password)){
                    echo "Hasło jest wymagane";
                    exit();
                }else{
                    $sql = "SELECT * FROM user WHERE login='$username'";
                    $result = read_from_database($sql);
                    if (mysqli_num_rows($result) === 1) {
                        $row = $result -> fetch_assoc();
                        if ($row['login'] === $username && password_verify($password, $row['password'])) {
                            if ($row['banned']) {
                                echo "Konto zbanowane do " . $row['banndate'];
                                exit();
                            } else {
                                echo "Zalogowano!";
                                $_SESSION['logged_in'] = true;
                                $_SESSION['ID'] = $row['ID'];
                                $_SESSION['ADMIN'] = $row['admin'];
                                header("Refresh:0");
                            }
                        }else{
                            echo "Niepoprawna nazwa użytkownika lub hasło";
                            exit();
                        }
                    }else{
                        echo "Niepoprawna nazwa użytkownika lub hasło";
                        exit();
                    }
            
                }
            }
        ?>

     </form>

</body>

</html>