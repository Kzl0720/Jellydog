<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "jellydog"; // Your Database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $expiry_month = mysqli_real_escape_string($conn, $_POST['expiry_month']);
    $expiry_year = mysqli_real_escape_string($conn, $_POST['expiry_year']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO payments (name, phone, address, card_number, expiry_month, expiry_year, cvv) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $phone, $address, $card_number, $expiry_month, $expiry_year, $cvv);

    // Execute the query
    if ($stmt->execute()) {
        echo "Payment details submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

