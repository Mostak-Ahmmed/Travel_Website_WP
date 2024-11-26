<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewer_name = $_POST['reviewer_name'];
    $review_text = $_POST['review_text'];

    $stmt = $conn->prepare("INSERT INTO reviews (reviewer_name, review_text) VALUES (?, ?)");
    $stmt->bind_param("ss", $reviewer_name, $review_text);

    if ($stmt->execute()) {
        header('location: about.html');
    } else {
        echo "Error: " . $stmt->error;
    }
    $conn->close();
    $stmt->close();
}
?>