<?php
session_start();
require('mysql_connect.php');
require("header.php");
$id = $_GET['id'];
$title = $content = $status = "";
$sql_select = "SELECT * FROM tasks WHERE id = $id";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);
    $status = htmlspecialchars($_POST["status"]);

    if (!empty($title) && !empty($content) && !empty($status)) {
        $sql_update = "UPDATE tasks SET title='$title', content='$content', status='$status' WHERE id = $id";

        if ($conn->query($sql_update) === TRUE) {
            echo '<div class="alert alert-success" role="alert">
                    Record updated successfully 😊
                  </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    An error occurred while updating 😱 <br>
                    Error:  '.$sql.' <br>  '.$conn->error.'
                 </div>';
        }
    }
}

$note = $conn->query($sql_select);
$conn->close();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>MSL | Tasks</title>
    <link rel='stylesheet' href='assets/css/bootstrap/bootstrap.min.css'>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='tasks.php'>My Tasks</a>
        </div>
    </nav>

    <div class='container'>
        <div class='row pt-3'>
            <div class='col'>
                <div class='card'>
                    <span>
                    <h1> <a class="m-2" href="tasks.php">⬅︎</a></h1>
                        <h1 class='card-title text-center'>Editing Task</h5>
                    </span>
                    <div class='card-body'>
                        <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=$id"); ?>' method='post'>

                            <?php
                            if ($note->num_rows > 0) {
                                while ($row = $note->fetch_assoc()) {
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $status = $row['status'];

                                    echo "
                                        <div class='mb-3'>
                                        <label for='title' class='form-label'>title</label>
                                        <input type='text' class='form-control' id='title' name='title' placeholder='An indecredible title' value='$title' required />
                                        </div>
                                        <div class='mb-3'>
                                            <label for='content' class='form-label'>content</label>
                                            <textarea class='form-control' id='content' name='content' placeholder='Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, iusto!' rows='3' required>$content</textarea>
                                        </div>
        
                                        <label for='status' class='form-label'>Prority</label>
                                    
                                        ";
                                }
                            }
                            ?>

                            <select class='form-select' name='status' required>
                                <option hidden>Select status</option>
                                <option value='Not Started' <?php if ($status == 'Not Started') {echo 'selected';} ?>>Not Started</option>
                                <option value='In Progress' <?php if ($status == 'In Progress') {echo 'selected';} ?>>In Progress</option>
                                <option value='Done' <?php if ($status == 'Done') {echo 'selected';} ?>>Done</option>
                            </select>

                            <div class='d-grid gap-2 pt-4'>
                                <button class='btn btn-primary' type='submit'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>