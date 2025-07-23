<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>To-Do List</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>My To-Do List</h1>

    <form method="POST" action="index.php">
      <input type="text" name="task" placeholder="Enter task" required>
      <button type="submit">Add</button>
    </form>

    <ul>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $conn->real_escape_string($_POST['task']);
        $conn->query("INSERT INTO tasks (task) VALUES ('$task')");
      }

      $result = $conn->query("SELECT * FROM tasks");

      while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['task']) . 
             " <a href='delete.php?id=" . $row['id'] . "'>❌</a></li>";
      }
      ?>
    </ul>
  </div>

  <script src="js/script.js"></script>
</body>
</html>
