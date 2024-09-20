
<?php
include 'db.php'; // Ensure db.php contains proper connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // Capture raw password
    
    // Check if email already exists in the users table
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Hash the password using password_hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the users table
        $sql = "INSERT INTO register (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $hashed_password);
        
        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        
    }

    $stmt->close();
    $conn->close();
}
?>
