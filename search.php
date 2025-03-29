<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "your_database"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = "";
$results = [];

if (isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);
    
    $sql = "SELECT * FROM your_table WHERE column_name LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
</head>
<body>
    <h2>Search</h2>
    <form method="POST">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Enter search term">
        <button type="submit">Search</button>
    </form>
    
    <?php if (!empty($results)): ?>
        <h3>Search Results:</h3>
        <ul>
            <?php foreach ($results as $row): ?>
                <li><?php echo htmlspecialchars($row['column_name']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($search): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>