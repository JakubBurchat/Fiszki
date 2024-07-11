<?php
    // data needed to connect to database
    define('SERVER_NAME', 'localhost');
    define('USER_NAME', 'root');
    define('DATABASE_NAME', 'fiszki');
    define('DATABASE_PASSWORD', '');

    function connect_to_database() { // returns a connection to the database
        $conn = new mysqli(SERVER_NAME, USER_NAME, database: DATABASE_NAME);
        if ($conn->connect_error) {
            die("Nieudane połączenie: " . $conn->connect_error);
        } 
        return $conn;
    }

    function read_data_to_array($sql, $fields) { // returns read data as an array
        $result = read_from_database($sql);
        $array = [];
        $row = 0;
        if ($result->num_rows > 0) {
            for ($i = 0; $i <= $result->num_rows-1; $i++) {
                $row = $result->fetch_assoc();
                foreach  ($fields as $name) {
                    array_push($array, $row[$name]);
                }
            }
        }
        return $array;
    }

    function insert_into_database($sql) { // inserts data into database
        $conn = connect_to_database();
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Błąd: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function read_from_database($sql) { // reads data from database
        $conn = connect_to_database();
        $result = $conn->query($sql);
        $conn->close();
        if ($result === NAN) {
            return "Nie wczytano żadnych danych";
        }
        return $result;
    }

    function delete_from_database($sql) { // deletes data from database
        $conn = connect_to_database();
        $conn->query($sql);
        $conn->close();
    }

    function update_to_database($sql) { // update data in database
        $conn = connect_to_database();
        $conn->query($sql);
        $conn->close();
    }
?>