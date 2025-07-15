<?php
// Connect to database
include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    // 1. Insert into database
    $stmt = $connect->prepare("INSERT INTO contact_message (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    $stmt->execute();

    // 2. Send Email
    $to = "billthiago04@gmail.com";
    $subject = "New Contact Message from $name";
    $body = "You received a new message:\n\nName: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send email.";
    }

    echo "<br>Saved to database.";
}
?>

