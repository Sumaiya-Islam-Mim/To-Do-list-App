<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1 class="text-center mb-4">To-Do List</h1>

    <form id="taskForm" class="input-group mb-3" method="POST" action="add_task.php">
      <input type="text" id="taskInput" name="task" class="form-control" placeholder="Enter a new task" required>
      <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <ul class="list-group" id="taskList">
      <?php
        $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0):
          while($row = $result->fetch_assoc()):
      ?>
            <li class="list-group-item"><?php echo htmlspecialchars($row['description']); ?></li>
      <?php
          endwhile;
        else:
          echo "<li class='list-group-item'>No tasks yet.</li>";
        endif;
      ?>
    </ul>
  </div>

<script>
  document.getElementById('taskForm').onsubmit = function() {
    // Clear input after submission (form posts to PHP)
    document.getElementById('taskInput').value = '';
    return true;
  };
</script>
</body>
</html>
