<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/forgotten_password.php';

class PasswordResetTest extends TestCase {

    public function testPasswordMatch() {
        $conn = $this->createMock(mysqli::class);
        $result = resetPassword("test@example.com", "password123", "password124", $conn);
        $this->assertEquals("Passwords do not match!", $result);
    }

    public function testPasswordLength() {
        $conn = $this->createMock(mysqli::class);
        $result = resetPassword("test@example.com", "short", "short", $conn);
        $this->assertEquals("Password must be at least 8 characters!", $result);
    }

    // Optional: keep or comment out depending on need
    // public function testUserNotFound() { ... }

    public function testPasswordUpdated() {
        // Real database connection
        $conn = new mysqli("localhost", "root", "", "skillprodb"); // DB name correct thaklo
    
        if ($conn->connect_error) {
            $this->fail("Database connection failed: " . $conn->connect_error);
        }
    
        $email = "nargisakter@gmail.com";
        $newPassword = "newtestpass123";
    
        // Call resetPassword function
        $result = resetPassword($email, $newPassword, $newPassword, $conn);
    
        $this->assertEquals("Password updated successfully!", $result);
    
        // Optional: reset to original password
        $hashed = password_hash("shuvo1711", PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed, $email);
        $stmt->execute();
    }
}    