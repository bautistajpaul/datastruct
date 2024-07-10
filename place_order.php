<?php
// Assuming you have a database connection established already

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you receive JSON data from the client
    $data = json_decode(file_get_contents('php://input'), true);

    // Example data structure expected from client-side JavaScript
    $orderItems = $data['cart'];
    $region = $data['region'];

    // Replace with your database credentials
    $host = 'localhost';
    $dbname = 'riosk';
    $username = 'username';
    $password = 'password';

    try {
        // Establish database connection using PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $pdo->beginTransaction();

        // Insert each order item into the database
        foreach ($orderItems as $item) {
            $foodId = $item['food_id'];
            $quantity = $item['quantity'];

            // Example SQL query to insert into order_item table
            $stmt = $pdo->prepare("INSERT INTO order_item (order_id, food_id, quantity) VALUES (:order_id, :food_id, :quantity)");
            // Replace :order_id with your actual order_id from your order table
            $stmt->execute([
                'order_id' => 1, // Replace with actual order_id
                'food_id' => $foodId,
                'quantity' => $quantity
            ]);
        }

        // Commit the transaction
        $pdo->commit();

        // Return a success JSON response
        $response = [
            'status' => 'success',
            'message' => 'Order placed successfully.'
        ];
        http_response_code(200); // HTTP status OK
        echo json_encode($response);
        exit();
    } catch (PDOException $e) {
        // Rollback the transaction on error
        $pdo->rollback();

        // Return an error JSON response
        $response = [
            'status' => 'error',
            'message' => 'Error placing order. Please try again later.'
        ];
        http_response_code(500); // Internal Server Error
        echo json_encode($response);
        exit();
    }
} else {
    // Return a method not allowed error if not a POST request
    http_response_code(405); // Method Not Allowed
    $response = [
        'status' => 'error',
        'message' => 'Method not allowed.'
    ];
    echo json_encode($response);
    exit();
}
?>
