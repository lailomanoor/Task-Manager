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


    <br> <br> <br>

    <?php
    $conn = new mysqli("localhost", "root", "", "task_manager");

    if ($conn->connect_error) {
        die("Connection Error" . $conn->connect_error);
    } else {
        $task_id = $_GET['id'];
        $stmt1 = $conn->prepare("SELECT * FROM tasks where id = ?");
        $stmt1->bind_param("i", $task_id);
        $stmt1->execute();
        $result = $stmt1->get_result();

        if ($result->num_rows == 1) {
            $task = $result->fetch_assoc();
            $title = $task['title'];
            $description = $task['description'];
            $priority = $task['priority'];

            $stmt2 = $conn->prepare("SELECT status_id FROM task_statuses WHERE task_id = ?");
            $stmt2->bind_param("i", $task_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $statuses = array();

            while ($statusRow = $result2->fetch_assoc()) {
                $statuses[] = $statusRow['status_id'];

            }

            $stmt1->close();
            $stmt2->close();
            $conn->close();
        }

    }

    ?>

    <div class="card text-black bg-light mb-3 mx-auto my-5" style="max-width: 40rem; margin-top: 50px;">
        <h2 class="pt-5 px-5 input-centered">Edit Task</h2>
        <div class="containers">
            <div class="r-container">
                <form class="item3-container" id="taskForm" action="updateTask.php?task_id=<?php echo $task_id; ?>"
                    method="POST">
                    <input type="hidden" name="task_id" value="<?php echo $taskId; ?>">
                    <div class="item3">
                        <span class="item3-title fs-6">TITLE:</span>
                    </div>
                    <div class="item3 p-0">
                        <span class="item3-title input-centered">
                            <input type="text" id="title" name="title" class="form-control w-100 input-centered"
                                value="<?php echo $title; ?>" required>
                        </span>
                    </div>
                    <div class="item3">
                        <span class="item3-title fs-6">DESCRIPTION:</span>
                    </div>
                    <div class="item3 p-0">
                        <span class="item3-title input-centered">
                            <textarea class="input-centered" id="description" name="description" rows="4" cols="4"
                                class="form-control w-100 input-centered"><?php echo $description; ?></textarea>
                        </span>
                    </div>
                    <div class="item3">
                        <span class="item3-title fs-6">PRIORITY:</span>
                    </div>
                    <div class="item3">
                        <span class="item3-title input-centered">
                            <div class="radio-group">
                                <label><input type="radio" name="priority" value="high" <?php if ($priority === 'high')
                                    echo 'checked'; ?> required> High</label><br>
                                <label><input type="radio" name="priority" value="medium" <?php if ($priority === 'medium')
                                    echo 'checked'; ?>> Medium</label><br>
                                <label><input type="radio" name="priority" value="low" <?php if ($priority === 'low')
                                    echo 'checked'; ?>> Low</label><br>
                            </div>
                        </span>
                    </div>
                    <div class="item3">
                        <span class="item3-title fs-6">STATUS:</span>
                    </div>
                    <div class="item3">
                        <span class="item3-title input-centered">
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="status[]" value="new" <?php if (in_array(3, $statuses))
                                    echo 'checked'; ?>> New</label><br>
                                <label><input type="checkbox" name="status[]" value="in-progress" <?php if (in_array(1, $statuses))
                                    echo 'checked'; ?>> In Progress</label><br>
                                <label><input type="checkbox" name="status[]" value="completed" <?php if (in_array(2, $statuses))
                                    echo 'checked'; ?>> Completed</label><br>
                            </div>
                        </span>
                    </div>
                    <!-- <input type="hidden" id="created-at" name="created-at" value="<?php echo date('Y-m-d H:i:s'); ?>"> -->
                    <input type="hidden" id="created-at" name="created-at">
                    <br>
                    <button class="btn btn-secondary"
                        style="margin-left: auto; margin-right: auto; display: block; width: 30%;" type="submit"
                        value="submit" onclick="return validateFormUpdate()">SUBMIT</button>
                    <br>
                </form>
            </div>
        </div>
    </div>




    <script>
        function validateForm() {
            var title = document.getElementById('title').value;
            var description = document.getElementById('description').value;
            var priority = document.querySelector('input[name="priority"]:checked');
            var status = document.querySelectorAll('input[name="status[]"]:checked');
            var createdAt = new Date().toISOString(); // Get current date and time
            document.getElementById('created-at').value = createdAt;

            if (title.trim() === '') {
                alert('Please enter a title');
                return false;
            }
            if (!priority) {
                alert('Please select a priority');
                return false;
            }

            if (status.length == 0) {
                alert('Please selected a status');
                return false;
            }

            var inProgressSelected = false;
            var completedSelected = false;


            for (var i = 0; i < status.length; i++) {
                if (status[i].value === 'in-progress') {
                    inProgressSelected = true;
                }
                else if (status[i].value === 'completed') {
                    completedSelected = true;
                }
            }

            if (inProgressSelected && completedSelected) {
                alert('Please selected either "In-Progress" or "Completed", not both');
                return false;
            }

            if (confirm('Do you want to submit the form?')) {
                var formData = new FormData(document.getElementById('taskForm'));
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'updateTask.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.error);
                        }
                    }
                };
                xhr.send(formData);
            }

            return true;

        }

    </script>
</body>

</html>
