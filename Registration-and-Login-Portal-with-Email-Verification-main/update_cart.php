<?php
$con = mysqli_connect("localhost", "root", "root@123", "phptutorials");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    // Get the current price
    $query = "SELECT price FROM orderid WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];

    // Calculate the new total price
    $totalPrice = $price * $quantity;

    // Update the quantity and total price in the database
    $updateQuery = "UPDATE orderid SET quantity = '$quantity', totalprice = '$totalPrice' WHERE id = '$id'";
    if (mysqli_query($con, $updateQuery)) {
        echo json_encode(['success' => true, 'newTotalPrice' => $totalPrice]);
    } else {
        echo json_encode(['success' => false]);
    }
}

mysqli_close($con);
?>
