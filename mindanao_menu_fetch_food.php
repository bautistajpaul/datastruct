<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "riosk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM food WHERE island_id = 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $foodName = htmlspecialchars($row["food_name"]);
        $foodPrice = htmlspecialchars($row["food_price"]);
        $foodDescription = htmlspecialchars($row["description"]);
        $foodId = htmlspecialchars($row["food_id"]);
        
        echo '
                <div class="menuItem col d-flex flex-column align-items-center justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/pictures/items/' . $foodId . '.png" class="food-img card-img-top" alt="' . $foodName . '">
                        <div class="card-body">
                            <h5 class="food-name card-title">' . $foodName . '</h5>
                            <h5 class="food-price">P ' . $foodPrice . '</h5>
                            <p class="card-text">' . $foodDescription . '</p>
                            <div class="food-qty d-flex justify-content-between align-items-center">
                                <span>Quantity:</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity(this)">-</button>
                                    </div>
                                    <input type="text" class="form-control text-center quantity-input" value="1" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity(this)">+</button>
                                    </div>
                                </div>
                            </div>
                            <button class="order-btn btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                        </div>
                    </div>
                </div>';
    }
} else {
    echo "No food items found for island_id 1.";
}

$conn->close();
?>
