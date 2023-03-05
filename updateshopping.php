<?php
session_start();
require('mysql_connect.php');
require("header.php");
$id = $_GET['id'];
$product = $quantity = $discount = "";
$sql_select = "SELECT * FROM shopping WHERE id = $id";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = htmlspecialchars($_POST["product"]);
    $quantity = htmlspecialchars($_POST["quantity"]);
    $discount = htmlspecialchars($_POST["discount"]);

    if (!empty($product) && !empty($quantity) && !empty($discount)) {
        $sql_update = "UPDATE shopping SET product='$product', quantity='$quantity', discount='$discount' WHERE id = $id";

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
    <title>MSL | Shopping</title>
    <link rel='stylesheet' href='assets/css/bootstrap/bootstrap.min.css'>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='shopping.php'>My Shopping Cart</a>
        </div>
    </nav>

    <div class='container'>
        <div class='row pt-3'>
            <div class='col'>
                <div class='card'>
                    <span>
                    <h1> <a class="m-2" href="shopping.php">⬅︎</a></h1>
                        <h1 class='card-title text-center'>CREATE A NEW NOTE</h5>
                    </span>
                    <div class='card-body'>
                        <form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=$id"); ?>' method='post'>

                            <?php
                            if ($note->num_rows > 0) {
                                while ($row = $note->fetch_assoc()) {
                                    $product = $row['product'];
                                    $quantity = $row['quantity'];
                                    $discount = $row['discount'];

                                    echo "
                                        <div class='mb-3'>
                                        <label for='product' class='form-label'>product</label>
                                        <input type='text' class='form-control' id='product' name='product' placeholder='An indecredible product' value='$product' required />
                                        </div>
                                        <div class='mb-3'>
                                            <label for='quantity' class='form-label'>quantity</label>
                                            <textarea class='form-control' id='quantity' name='quantity' placeholder='Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, iusto!' rows='3' required>$quantity</textarea>
                                        </div>
        
                                        <label for='discount' class='form-label'>Prority</label>
                                    
                                        ";
                                }
                            }
                            ?>

                            <select class='form-select' name='discount' required>
                                <option hidden>Select discount</option>
                                <option value='low' <?php if ($discount == 'low') {echo 'selected';} ?>>Low</option>
                                <option value='middle' <?php if ($discount == 'middle') {echo 'selected';} ?>>Middle</option>
                                <option value='high' <?php if ($discount == 'high') {echo 'selected';} ?>>High</option>
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