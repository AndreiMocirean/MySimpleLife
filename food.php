<?php
    session_start();
    require("header.php");
    require("mysql_connect.php");
    $sql = "SELECT * FROM food";
    $food = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSL | Food</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Text1</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Text2</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Text3</a></li>
                </ul><button class="btn btn-primary" type="button" >Login</button>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">My Food</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Healthy</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($food->num_rows > 0) {
                                while($row = $food->fetch_assoc()) {
                                    $id = $row["id"];
                                    $title = $row["title"];
                                    $content = $row["content"];
                                    $Healthy = ucfirst($row["healthy"]);
                                    if($_SESSION['user_id'] == $row['userid']){
                                    echo "
                                        <tr>
                                            <th scope='row'>$id</th>
                                            <td>$title</td>
                                            <td>$content</td>
                                            <td>$healthy</td>
                                            <td>
                                                <a class='btn btn-secondary' href='read_one_food.php?id=$id'>Read</a> 
                                                <a class='btn btn-secondary' href='updatefood.php?id=$id'>Edit</a> 
                                                <a class='btn btn-danger' href='deletefood.php?id=$id'>Delete</a>
                                            </td>
                                        </tr>";
                                }
                            }
                            }
                        ?>

                    </tbody>
                </table>

                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="createfood.php">Add Food</a>
            </div>
        </div>
    </div>

</body>
</html>
