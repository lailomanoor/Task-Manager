<?php
$taskid = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "task_manager");

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
} else {

    $stmt2 = $conn->prepare("DELETE FROM task_statuses WHERE task_id = ?");
    $stmt2->bind_param("i", $taskid);
    $stmt2->execute();

    $stmt1 = $conn->prepare("DELETE FROM tasks where id = ?");
    $stmt1->bind_param("i", $taskid);
    $stmt1->execute();

    $stmt1->close();
    $stmt2->close();

    echo "Task deleted successfully";
    //header("Location: viewtasks.php");
    exit();

}


?>
