<?php
$mysqli = new mysqli("localhost", "root", "", "bloom"); 

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $gender = $_POST["gender"];
    $occupation = $_POST["occupation"];
    $address = $_POST["address"];
    $area = $_POST["area"];
    $district = $_POST["district"];
    $pincode = $_POST["pincode"];

    $sql = "INSERT INTO municipality_registration (full_name, date_of_birth, email, mobile_number, gender, occupation, address, area, district, pincode)
            VALUES ('$full_name', '$date_of_birth', '$email', '$mobile_number', '$gender', '$occupation', '$address', '$area', '$district', '$pincode')";

    if ($mysqli->query($sql) === TRUE) {
    header("Location: wastage_reg.html");
    exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
