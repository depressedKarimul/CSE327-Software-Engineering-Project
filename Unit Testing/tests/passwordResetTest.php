<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/forgotten_password.php';

class PasswordResetTest extends TestCase {

    // Test case: Passwords do not match
    public function testPasswordMatch() {
        $conn = $this->createMock(mysqli::class); // Mock the database connection
        $result = resetPassword("test@example.com", "password123", "password124", $conn);
        $this->assertEquals("Passwords do not match!", $result);
    }

    // Test case: Password is too short
    public function testPasswordLength() {
        $conn = $this->createMock(mysqli::class); // Mock the database connection
        $result = resetPassword("test@example.com", "short", "short", $conn);
        $this->assertEquals("Password must be at least 8 characters!", $result);
    }

   

    // Test case: Password successfully updated in real database
    public function testPasswordUpdated() {
        // Create a real database connection
        $conn = new mysqli("localhost", "root", "", "skillprodb"); // Ensure DB name is correct

        // Fail test if database connection fails
        if ($conn->connect_error) {
            $this->fail("Database connection failed: " . $conn->connect_error);
        }

        $email = "nargisakter@gmail.com";
        $newPassword = "newtestpass123";

        // Attempt to reset password
        $result = resetPassword($email, $newPassword, $newPassword, $conn);

        // Assert expected success message
        $this->assertEquals("Password updated successfully!", $result);

        $hashed = password_hash("shuvo1711", PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed, $email);
        $stmt->execute();
    }
}
