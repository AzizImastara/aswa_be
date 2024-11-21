<?php

class AuthController
{
    private $db; // Assuming you have a database connection

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register($username, $password)
    {
        // Validate input
        if (empty($username) || empty($password)) {
            return "Username and password are required.";
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Save to database
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $hashedPassword])) {
            return "User registered successfully.";
        } else {
            return "Error registering user.";
        }
    }

    public function login($username, $password)
    {
        // Validate input
        if (empty($username) || empty($password)) {
            return "Username and password are required.";
        }

        // Check user credentials
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Create session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return "Login successful.";
        } else {
            return "Invalid username or password.";
        }
    }

    public function logout()
    {
        // Destroy user session
        session_start();
        session_unset();
        session_destroy();
        return "Logout successful.";
    }
}
?>