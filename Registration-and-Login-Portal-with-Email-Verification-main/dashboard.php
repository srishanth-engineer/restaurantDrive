<?php
include('authentication.php');
$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');

// Database connection
$con = mysqli_connect("localhost", "root", "root@123", "phptutorials");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the table 'orderid' already exists
$tableExistsQuery = "SHOW TABLES LIKE 'orderid'";
$tableExistsResult = mysqli_query($con, $tableExistsQuery);

if (mysqli_num_rows($tableExistsResult) == 0) {
    // Table doesn't exist, so create it
    $createQuery = "CREATE TABLE orderid (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        item_name VARCHAR(100) NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        totalprice DECIMAL(10,2) NOT NULL,
        ordStatus INT NOT NULL
    )";

    if (mysqli_query($con, $createQuery)) {
        echo "Table 'orderid' created successfully.";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }
}

// Close connection
mysqli_close($con);
?>
<div id="listitems">
    <head>
        <link href="styles/style1.css" rel="stylesheet" type="text/css">
    </head>
    <div id="item-1">
        <img src="/images/image1.avif" width="80px" height="80px">
        <a href="starters.php">Starters</a>
    </div>
    <div id="item-2">
        <img src="/images/image2.avif" width="80px" height="80px">
        <a href="deserts.php">Deserts</a>
    </div>
    <div id="item-3">
        <img src="/images/image3.avif" width="80px" height="80px">
        <a href="curries.php">Curries</a>
    </div>
</div>
<?php include('includes/footer.php'); ?>
