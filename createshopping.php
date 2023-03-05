<?php
    session_start();
    require("header.php");
    require("mysql_connect.php");
    $title = $content = $priority = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $priority = htmlspecialchars($_POST["priority"]);
        $id=$_SESSION["user_id"];

        if (!empty($title) && !empty($content) && !empty($priority)) {
            $sql = "INSERT INTO shopping(product, quantity, discount, userid) VALUES ('$title','$content','$priority','$id')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">
                        Record updated successfully.
                      </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        An error occurred while updating.<br>
                        Error:  '.$sql.' <br>  '.$conn->error.'
                      </div>';
            }
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSL | Shopping</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="shopping.php">Shopping</a>
        </div>
    </nav>

    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <div class="card">
                    <span>
                    <h1> <a class="m-2" href="shopping.php">⬅︎</a></h1>
                    <h1 class="card-title text-center">ADD TO SHOPPING LIST</h5>
                    </span>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Choose a product" required />
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Quantity</label>
                                    <textarea class="form-control" id="content" name="content" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, iusto!" rows="3" required></textarea>
                                </div>

                                <label for="priority" class="form-label">Discount</label>
                                <select class="form-select" name="priority" required>
                                    <option selected hidden>Is the product on a discount?</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>

                                <div class="d-grid gap-2 pt-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
