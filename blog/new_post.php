<?php
include 'config/config.php';
include 'includes/header.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title) && !empty($content)) {
        $sql = "INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            $message = "New post created successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Title and content cannot be empty.";
    }
}

$conn->close();
?>

<h2>Create a New Post</h2>
<form action="new_post.php" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>
    <button type="submit">Submit</button>
</form>

<?php if ($message): ?>
    <p class="message"><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
