<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get data from the table
$sql = "SELECT id, name, email, subject, message FROM contact_details"; // Replace 'contact_details' with your table name
$result = $conn->query($sql);

// Check if any data is returned and display it
if ($result->num_rows > 0) {
    // Display data in a table format
    echo "<table border='1' style='width: 100%; border-collapse: collapse;'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>";

    // Loop through each row and output data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["subject"]) . "</td>
                <td>" . htmlspecialchars($row["message"]) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
$conn->close();
?>
