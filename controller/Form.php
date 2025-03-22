<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $concern = $_POST['concern'];
    $message = $_POST['message'];

    // SQL Query
    $sql = "INSERT INTO contacts (full_name, email, phone, concern, message) 
            VALUES ('$name', '$email', '$phone', '$concern', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Form submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
