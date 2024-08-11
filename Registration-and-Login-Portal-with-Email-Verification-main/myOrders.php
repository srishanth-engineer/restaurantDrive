<?php
include('authentication.php');
$page_title = "My Orders";
include('includes/header.php');
include('includes/navbar.php');

// Database connection
$con = mysqli_connect("localhost", "root", "root@123", "phptutorials");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch orders where ordStatus is 1 (indicating completed orders)
$query = "SELECT * FROM orderid WHERE ordStatus = 1";
$result = mysqli_query($con, $query);
?>

<div class="container mt-5">
    <h1>My Orders</h1>

    <?php if (mysqli_num_rows($result) == 0): ?>
        <p>No orders to display.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['totalprice']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php
include('includes/footer.php');
mysqli_close($con);
?>
