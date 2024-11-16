<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Replace with your database connection details
    $servername = "your_server_name";
    $username_db = "your_db_username";
    $password_db = "your_db_password";
    $database = "your_database_name";
    
    // Create a database connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    
    // Execute the query
    $result = $conn->query($sql);
    
    // Check if a row is returned (valid login)
    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Login failed. Please check your username and password.";
    }
    
    // Close the database connection
    $conn->close();
}
?>
