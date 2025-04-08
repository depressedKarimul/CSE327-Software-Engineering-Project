
<?php
use PHPUnit\Framework\TestCase;

// Include the file with the resetPassword function
require_once __DIR__ . '/../src/forgotten_password.php';

class PasswordResetTest extends TestCase {

    public function testPasswordMatch() {
        // Create a mock for the mysqli connection object
        $conn = $this->createMock(mysqli::class);
        
        // Test when passwords don't match
        $result = resetPassword("test@example.com", "password123", "password124", $conn);
        $this->assertEquals("Passwords do not match!", $result);
    }

    public function testPasswordLength() {
        // Create a mock for the mysqli connection object
        $conn = $this->createMock(mysqli::class);

        // Test when password is too short
        $result = resetPassword("test@example.com", "short", "short", $conn);
        $this->assertEquals("Password must be at least 8 characters!", $result);
    }

    public function testUserNotFound() {
        // Create a mock for the mysqli connection object
        $conn = $this->createMock(mysqli::class);
        
        // Create a mock for the mysqli_stmt object
        $stmt = $this->createMock(mysqli_stmt::class);

        // Mock the connection's prepare method to return the mock statement
        $conn->method('prepare')->willReturn($stmt);

        // Mock the statement's methods
        $stmt->method('bind_param')->willReturn(true);
        $stmt->method('execute')->willReturn(true);

        // Create a mock result that simulates "no user found"
        $mockResult = $this->createMock(mysqli_result::class);
        
        // Set num_rows directly on the mock result object
        $mockResult->num_rows = 0;

        // Mock the statement's get_result method to return the mock result object
        $stmt->method('get_result')->willReturn($mockResult);

        // Call the resetPassword function and assert the correct message
        $result = resetPassword("nonexistent@example.com", "password123", "password123", $conn);
        $this->assertEquals("No user found with this email address!", $result);
    }

    public function testPasswordUpdated() {
        // Create a mock for the mysqli connection object
        $conn = $this->createMock(mysqli::class);
        
        // Create a mock for the mysqli_stmt object
        $stmt = $this->createMock(mysqli_stmt::class);

        // Mock the connection's prepare method to return the mock statement
        $conn->method('prepare')->willReturn($stmt);

        // Mock the statement's methods
        $stmt->method('bind_param')->willReturn(true);
        $stmt->method('execute')->willReturn(true);

        // Create a mock result that simulates "user found"
        $mockResult = $this->createMock(mysqli_result::class);
        
        // Set num_rows directly on the mock result object
        $mockResult->num_rows = 1;

        // Mock the statement's get_result method to return the mock result object
        $stmt->method('get_result')->willReturn($mockResult);

        // Call the resetPassword function and assert the correct success message
        $result = resetPassword("test@example.com", "newpassword123", "newpassword123", $conn);
        $this->assertEquals("Password updated successfully!", $result);
    }
}
