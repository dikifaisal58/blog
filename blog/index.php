<?php
include 'config/config.php';
include 'includes/header.php';

$sql = "SELECT id, title, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h2><a href='post.php?id=" . $row["id"] . "'>" . htmlspecialchars($row["title"]) . "</a></h2>";
        echo "<p>Posted on " . date("F j, Y", strtotime($row["created_at"])) . "</p>";
        echo "</article>";
    }
} else {
    echo "<article><p>No posts found.</p></article>";
}

include 'includes/footer.php';
$conn->close();
?>
