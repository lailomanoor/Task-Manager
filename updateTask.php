<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task_id = $_GET['task_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $selectedStatus = isset($_POST['status']) ? $_POST['status'] : array();

        // Database connection
        $conn = new mysqli("localhost", "root", "", "task_manager");
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        // Update task details
        $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, priority = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $description, $priority, $task_id);
        $stmt->execute();

        // Delete existing status entries for the task
        $deleteStmt = $conn->prepare("DELETE FROM task_statuses WHERE task_id = ?");
        $deleteStmt->bind_param("i", $task_id);
        $deleteStmt->execute();



        foreach ($selectedStatus as $status) {
            $statusQuery = "SELECT id FROM statuses WHERE name = '$status'";
            $statusResult = mysqli_query($conn, $statusQuery);
            $statusRow = mysqli_fetch_assoc($statusResult);
            $status_id = $statusRow['id'];

            $taskStatusSql = "INSERT INTO task_statuses (`task_id`, `status_id`) VALUES ($task_id, $status_id)";
            mysqli_query($conn, $taskStatusSql);
        }

        $stmt->close();
        $deleteStmt->close();
        $conn->close();

        
        header("Location: viewtasks.php?success=1");
        exit();
    } else {
        header("Location: viewtasks.php");
        exit();
    }
}
?>
