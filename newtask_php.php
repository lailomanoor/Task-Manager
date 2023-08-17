<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "task_manager");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $selectedStatus = isset($_POST['status']) ? $_POST['status'] : array();
    $createdAt = $_POST['created-at'];

    $sql = "INSERT INTO tasks (`title`,`description`, `priority`, `created_at`) VALUES ('$title', '$description', '$priority', '$createdAt')";

    if (mysqli_query($conn, $sql)) {
        $taskId = mysqli_insert_id($conn);

        foreach ($selectedStatus as $status) {
            $statusQuery = "SELECT id FROM statuses WHERE name = '$status'";
            $statusResult = mysqli_query($conn, $statusQuery);
            $statusRow = mysqli_fetch_assoc($statusResult);
            $status_id = $statusRow['id'];

            $taskStatusSql = "INSERT INTO task_statuses (`task_id`, `status_id`) VALUES ($taskId, $status_id)";
            mysqli_query($conn, $taskStatusSql);
        }


        echo "Task has been created successfully";
    } else {
        echo "Error creating task: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
