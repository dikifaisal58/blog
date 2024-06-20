<?php
include 'config/config.php';
include 'includes/header.php';

$id = intval($_GET['id']);

$sql = "SELECT title, content, created_at FROM posts WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<article>";
    echo "<h2>" . htmlspecialchars($row["title"]) . "</h2>";
    echo "<p>Posted on " . date("F j, Y", strtotime($row["created_at"])) . "</p>";
    echo "<div>" . nl2br(htmlspecialchars($row["content"])) . "</div>";
    echo "</article>";
} else {
    echo "<article><p>Post not found.</p></article>";
}

include 'includes/footer.php';
$stmt->close();
$conn->close();
?>
