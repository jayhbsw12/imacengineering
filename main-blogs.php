<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'blog_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch blog posts
$result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p><em>by " . $row['author'] . " on " . $row['created_at'] . "</em></p>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No blogs found.";
}

$conn->close();
?>