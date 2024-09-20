<?php 
include 'db.php'; // Ensure db.php contains proper connection details

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully"; // This should display if connection is successful
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); // Use trim to remove extra spaces
    $password = $_POST['password'];

    // Debugging: Check if form data is received
    if (empty($email) || empty($password)) {
        echo "Please fill in both fields."; 
    } else {
        // Convert email to lowercase to avoid case sensitivity issues
        $email = strtolower($email);

        // Debugging: Output the email being checked
        echo "Checking email: " . $email . "<br>";

        // Check if email exists in the database
        $sql = "SELECT * FROM users WHERE LOWER(email) = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            // Debugging: Check if query preparation failed
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Fetch user data
            $user = $result->fetch_assoc();

            // Debugging: Output the email fetched from the database
            echo "User found: " . $user['email'] . "<br>";

            // Verify the entered password with the stored hashed password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a session and log the user in
                session_start();
                $_SESSION['username'] = $user['username']; // or another identifier like email or user ID
                $_SESSION['userid'] = $user['id'];

                // Debugging: Print success message
                echo "Login successful. Redirecting...";

                // Redirect to a logged-in page
                header("Location: welcome.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No account found with that email.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
