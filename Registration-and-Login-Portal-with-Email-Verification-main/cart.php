<?php
include('authentication.php');
$page_title = "Your Cart";
include('includes/header.php');
include('includes/navbar.php');

// Database connection
$con = mysqli_connect("localhost", "root", "root@123", "phptutorials");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch cart items
$query = "SELECT * FROM orderid WHERE ordStatus = 0";
$result = mysqli_query($con, $query);

// Initialize totalOrderCost
$totalOrderCost = 0;
?>

<div class="container mt-5">
    <h1>Your Cart</h1>

    <?php if (mysqli_num_rows($result) == 0): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['item_name']; ?></td>
                        <td>
                            <button class="btn btn-secondary btn-sm update-quantity" data-id="<?php echo $row['id']; ?>" data-action="decrement">-</button>
                            <span id="quantity-<?php echo $row['id']; ?>"><?php echo $row['quantity']; ?></span>
                            <button class="btn btn-secondary btn-sm update-quantity" data-id="<?php echo $row['id']; ?>" data-action="increment">+</button>
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td id="totalprice-<?php echo $row['id']; ?>"><?php echo $row['totalprice']; ?></td>
                    </tr>
                    <?php
                    // Accumulate the total order cost
                    $totalOrderCost += $row['totalprice'];
                    ?>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Total Amount: <?php echo $totalOrderCost; ?> </h3> <!-- Display the total order cost -->

        <form method="POST" action="">
            <button type="submit" name="order_now" class="btn btn-success">Order Now</button>
        </form>

        <?php
        // Handle order now action
        if (isset($_POST['order_now'])) {
            $updateStatusQuery = "UPDATE orderid SET ordStatus = 1 WHERE ordStatus = 0";
            if (mysqli_query($con, $updateStatusQuery)) {
                echo "<p>Your order has been placed successfully!</p>";
            } else {
                echo "<p>Something went wrong. Please try again later.</p>";
            }
        }
        ?>
    <?php endif; ?>
</div>

<script>
// JavaScript to handle quantity update
document.querySelectorAll('.update-quantity').forEach(button => {
    button.addEventListener('click', function() {
        const itemId = this.dataset.id;
        const action = this.dataset.action;
        const quantityElement = document.getElementById(`quantity-${itemId}`);
        const totalPriceElement = document.getElementById(`totalprice-${itemId}`);
        let quantity = parseInt(quantityElement.innerText);

        if (action === 'increment') {
            quantity++;
        } else if (action === 'decrement' && quantity > 0) {
            quantity--;
        }

        // Update quantity in database
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    quantityElement.innerText = quantity;
                    totalPriceElement.innerText = response.newTotalPrice;

                    // Update total order cost (you may need to re-fetch it from the server)
                    location.reload(); // Reload page to reflect the updated total cost
                } else {
                    alert('Failed to update quantity.');
                }
            }
        };
        xhr.send(`id=${itemId}&quantity=${quantity}`);
    });
});
</script>

<?php
include('includes/footer.php');
mysqli_close($con);
?>
