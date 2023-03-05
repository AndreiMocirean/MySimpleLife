<?php
  session_start();
  require("header.php");
    require("mysql_connect.php");
    $sql = "SELECT * FROM shopping";
    $shopping = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSL | Shopping</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<?php if($_SESSION['user_type'] == 'admin'):?>
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
            <a class="navbar-brand" href="index.php">My Shopping Cart</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($shopping->num_rows > 0) {
                                while($row = $shopping->fetch_assoc()) {
                                    $id = $row["id"];
                                    $product = $row["product"];
                                    $quantity = $row["quantity"];
                                    $discount = ucfirst($row["discount"]);
                                    echo "
                                        <tr>
                                            <th scope='row'>$id</th>
                                            <td>$product</td>
                                            <td>$quantity</td>
                                            <td>$discount</td>
                                            <td>
                                                <a class='btn btn-secondary' href='read_one_shopping.php?id=$id'>Read</a> 
                                                <a class='btn btn-secondary' href='updateshopping.php?id=$id'>Edit</a> 
                                                <a class='btn btn-danger' href='deleteshopping.php?id=$id'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                }
                        ?>

                    </tbody>
                </table>

                <a class="btn btn-primary float-end m-4 ps-3 pe-3" href="createshopping.php">Add item</a>
            </div>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
