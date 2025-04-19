<?php
use PHPUnit\Framework\TestCase;

class StudentSettingsTest extends TestCase
{
    // 1. Test Database Connection
    public function testDatabaseConnection()
    {
        include(__DIR__ . '/../database.php'); // path adjusted
        $this->assertNotNull($conn, "Database connection should not be null.");
    }

    // 2. Test Fetching User
    public function testFetchUser()
    {
        include(__DIR__ . '/../database.php');
        $user_id = 1; // Make sure user_id 1 exists in your database

        $stmt = $conn->prepare("SELECT * FROM User WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $this->assertIsArray($user, "Fetched user should be an array.");
        $this->assertArrayHasKey('firstName', $user, "User array should have firstName key.");
    }

    // 3. Test Password Hashing
    public function testPasswordHashing()
    {
        $plainPassword = "mySecurePassword123";
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        $this->assertTrue(password_verify($plainPassword, $hashedPassword), "Password should verify correctly.");
    }
}
?>
