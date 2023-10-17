<?php
$mysqli = new mysqli("localhost", "root", "", "bloom");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];
    
    $sql = "SELECT * FROM user_registration WHERE phone_number='$phone_number' AND password='$password' AND user_type='$user_type'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        if ($user_type == "General User") {
            header("Location: index.html");
        } elseif ($user_type == "Municipality Head") {
            
            header("Location: municipal_reg.html");
        }
    } else {
        echo "Login failed. Check your credentials.";
    }
}

$mysqli->close();
?>
