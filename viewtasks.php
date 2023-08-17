<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Source+Sans+3:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input {
            background-color: white;
            color: black;
        }

        textarea {
            margin: 20px auto;
            padding: 10px;
            display: block;
            width: 300px;
            margin: 20px auto;
            border-radius: 5px;
        }

        .button-3 {
            background-color: #ffffff00;
            border: 1px solid black;
            color: white;
            border-radius: 8px;
            color: black;
            cursor: pointer;
            font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            display: block;
            width: 100px;
            margin: 20px auto;
            outline: none;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            touch-action: manipulation;
            transition: box-shadow 0.2s, -ms-transform 0.1s, -webkit-transform 0.1s, transform 0.1s;
            user-select: none;
            -webkit-user-select: none;
            position: relative;
        }

        .button-3:active {
            transform: scale(0.96);
        }

        .containers {
            margin: auto auto;
            width: 600px;
        }

        .r-container {
            display: grid;
            gap: px;
            padding: 5px;
            align-items: center;
        }

        .r-container>div {
            text-align: left;
            padding: 10px 10px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            grid-template-columns: 1fr 2fr;
            gap: px;
            padding: 5px;
            align-items: center;
        }

        .grid-container>div {
            text-align: left;
            padding: 20px 20px;
            font-size: 20px;
        }

        .item1 {
            grid-row: 1 / 5;
            display: flex;
            align-items: center;
        }

        .container {
            display: flex;
            align-items: center;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            text-align: center;
            /* font-family: 'Vidaloka', serif; */
            /* font-family: "Playfair Display", serif; */
        }

        .item1>h1 {
            padding: 20px;
            background-color: silver;
            border-radius: 10px;
            overflow: visible;
        }

        .item3-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .item3 {
            display: flex;
            justify-content: space-between;
        }

        .item3-rating {
            background-color: silver;
            padding: 4px;
            border-radius: 4px;
        }

        .item3-rating::before,
        .item3-rating::after {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: silver;
            border-radius: 50%;
            margin-right: 4px;
        }

        .item3-title {
            flex-basis: 50%;
        }

        .input-centered {
            margin-left: auto;
            margin-right: auto;
        }

        .no-hover-blue:hover {
            color: white;
            text-decoration: none;
        }

        .dropdown {
            position: absolute;
            right: 10px;
            top: 10px;
            color: #fff;
        }

        .bg-color {
            background-color: #272727
        }

        .logo {
            font-family: "Playfair Display", serif;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #DDD;
        }


        th {
            background-color: #f8f8f8;
        }

        th:not(:first-child),
        td:not(:first-child) {
            border-left: 1px solid #DDD;
        }

        .edit-btn,
        .delete-btn {
            cursor: pointer;
            font-size: 14px;
            color: #999;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            color: #555;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 10px;
            margin-left: 5vw;
        }

        .search-input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            font-size: 14px;
            width: 200px;
        }

        .search-button {
            padding: 8px 12px;
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            color: #555;
        }

        .search-button:hover {
            background-color: #e6e6e6;
        }
    </style>
    <title>Task Manager</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-color">
        <a class="navbar-brand" style="margin-left: 20px;" href="#">
            <h3 class="logo">Task Manager </h3>
        </a>

        <div class="navbar-expand-lg" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="newtask.php">Add New Task</a>
                        <a class="dropdown-item" href="viewtasks.php">View Tasks</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br> <br>

    <h3>Tasks</h3>
    <br><br>

    <div class="search-container">
        <form action="" method="get">
            <input type="text" name="search" id="search-input" class="search-input"
                placeholder="Search by title or priority"
                value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <br>
    <?php

    $conn = new mysqli("localhost", "root", "", "task_manager");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } else {
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $stmt = $conn->prepare("SELECT * FROM tasks WHERE title LIKE CONCAT('%', ?, '%') OR priority LIKE CONCAT('%', ?, '%')");
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
        } else {
            $stmt = $conn->prepare("SELECT * FROM tasks");
        }

        $stmt->execute();
        $result = $stmt->get_result();

        echo ' <table id="task-table">
                <tr>
                    <th></th> <!-- Empty cell for icons -->
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $priority = $row['priority'];
                $createdAt = $row['created_at'];

                $sql = $conn->prepare("SELECT status_id FROM task_statuses WHERE task_id = ?");
                $sql->bind_param("i", $id);

                $sql->execute();
                $sqlresult = $sql->get_result();

                $statuses = array();

                while ($statusRow = $sqlresult->fetch_assoc()) {
                    $statusid = $statusRow['status_id'];

                    if ($statusid == 1) {
                        $statuses[] = "In-Progress";
                    } elseif ($statusid == 2) {
                        $statuses[] = "Completed";
                    } elseif ($statusid == 3) {
                        $statuses[] = "New";
                    }
                }

                $status = implode(", ", $statuses);


                echo '
                <tr>
                    <td>
                        <a href = "editTask.php?id=' . $id . '"><i class="fas fa-edit edit-btn"></i> <a> <!-- Edit button icon -->
                        <a href="javascript:void(0);" onclick="confirmDelete(' . $id . ')"><i class="fas fa-trash-alt delete-btn"></i></a><!-- Delete button icon -->
                    </td>
                    <td>' . $id . '</td>
                    <td>' . $title . '</td>
                    <td>' . $description . '</td>
                    <td>' . $priority . '</td>
                    <td>' . $status . '</td>
                    <td>' . $createdAt . '</td>
                </tr>';

            }


            echo '</table>';
        }

    }



    ?>

    <br><br>



    <script>

        function confirmDelete(task_id) {
            if (confirm('Are you sure you want to delete the task?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'deleteTask.php?id=' + task_id, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                        window.location.reload();
                    }
                };
                xhr.send();
            }
        }


    </script>
</body>

</html>
