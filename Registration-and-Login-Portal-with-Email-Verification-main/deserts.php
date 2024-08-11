<?php
include('authentication.php');
$page_title = "deserts";
include('includes/header.php');
include('includes/navbar.php');

// Database connection
$con = mysqli_connect("localhost","root","root@123","phptutorials");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = 1; // Default quantity
    $totalprice = $price * $quantity;
    $ordStatus=0;

    // Insert query
    $query = "INSERT INTO orderid (item_name, quantity, price, totalprice, ordStatus) VALUES ('$item_name', '$quantity', '$price', '$totalprice', '$ordStatus')";
    if(mysqli_query($con, $query)){
        echo "$item_name successfully added to cart";
    }else{
        echo "something error occured try after some time";
    }
}

?>

<div class="container">
    <h1 class="mt-5">Deserts Menu</h1>
    <div class="row">
        <!-- Desert 1 -->
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/starter1.jpg" class="card-img-top" alt="Desert 1">
                <div class="card-body">
                    <h5 class="card-title">Crispy Chicken Wings</h5>
                    <p class="card-text">Spicy and crispy chicken wings served with a tangy dipping sauce.</p>
                    <p class="card-text"><strong>Price:</strong> $8.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Crispy Chicken Wings">
                        <input type="hidden" name="price" value="8.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Repeat for other deserts... -->
        <!-- Desert 2 -->
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 2">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- item3 -->
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <img src="images/Desert2.jpg" class="card-img-top" alt="Desert 3">
                <div class="card-body">
                    <h5 class="card-title">Garlic Bread with Cheese</h5>
                    <p class="card-text">Golden brown garlic bread topped with melted cheese.</p>
                    <p class="card-text"><strong>Price:</strong> $4.99</p>
                    <form method="POST" action="">
                        <input type="hidden" name="item_name" value="Garlic Bread with Cheese">
                        <input type="hidden" name="price" value="4.99">
                        <button type="submit" class="btn btn-primary">Add to Order</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Repeat for all other deserts -->
    </div>
</div>

<?php include('includes/footer.php'); ?>
