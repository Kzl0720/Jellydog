
<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "jellydog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query payments table
$sql = "SELECT name, phone, address, card_number, expiry_month, expiry_year, cvv FROM payments";
$result = $conn->query($sql);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Payments</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Card Number</th>
            <th>Expiry Month</th>
            <th>Expiry Year</th>
            <th>CVV</th>
        </tr>

        <?php
        // Counter for serial numbers
        $serialNumber = 1;

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serialNumber . "</td>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["card_number"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["expiry_month"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["expiry_year"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["cvv"]) . "</td>";
                echo "</tr>";
                $serialNumber++; // Increment serial number for next row
            }
        } else {
            echo "<tr><td colspan='8'>No payments found</td></tr>";
        }

        // Close the connection
        $conn->close();
        ?>
    </table>
</body>
</html>
