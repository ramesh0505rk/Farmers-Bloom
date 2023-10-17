<?php
$mysqli = new mysqli("localhost", "root", "", "bloom");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    $check_query = "SELECT phone_number FROM user_registration WHERE phone_number = '$phone_number'";
    $result = $mysqli->query($check_query);

    if ($result->num_rows > 0) {
        echo "Phone number already registered. Please use a different phone number.";
    } else {
       
        $sql = "INSERT INTO user_registration (username, phone_number, password, user_type)
                VALUES ('$username', '$phone_number', '$password', '$user_type')";

        if ($mysqli->query($sql) === TRUE) {
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}

$mysqli->close();
?>
