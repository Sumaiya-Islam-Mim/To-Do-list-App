<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['task'])) {
    $task = $conn->real_escape_string($_POST['task']);
    $sql = "INSERT INTO tasks (description) VALUES ('$task')";
    $conn->query($sql);
}

header("Location: index.php");
exit();
?>
