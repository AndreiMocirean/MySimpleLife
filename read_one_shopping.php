<?php
    session_start();
    require("mysql_connect.php");
    require("header.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM shopping WHERE id = $id";
    $shopping = $conn->query($sql);
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" quantity="IE=edge">
    <meta name="viewport" quantity="width=device-width, initial-scale=1.0">
    <title>MSL | Shopping</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">My Shopping Cart</a>
        </div>
    </nav>

    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <div class="card">
                    <?php
                    if ($shopping->num_rows > 0) {
                        while ($row = $shopping->fetch_assoc()) {
                            $id = $row["id"];
                            $product = $row["product"];
                            $quantity = $row["quantity"];
                            $discount = ucfirst($row["discount"]);

                            echo "
                                    <h1 class='card-header text-center'>$id - $product</h1>
                                    <div class='card-body'>
                                        quantity:
                                        $quantity
                                        <hr>
                                        discount: $discount
                                    </div>
                                ";
                        }
                    }

                    echo '
                        <div class="card-footer">
                            <a class="btn btn-secondary" href="shopping.php">Back</a>
                            <a class="btn btn-secondary" href="updateshopping.php?id='.$id.'">Edit</a>
                            <a class="btn btn-danger" href="deleteshopping.php?id='.$id.'">Delete</a>
                        </div>'

                    ?>
                    
                </div>
            </div>
        </div>
    </div>

</body>


</html>
