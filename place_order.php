<?php
// Enable error reporting for debugging purposes (turn off in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$host = 'localhost';
$dbname = 'riosk';
$username = 'root';
$password = '';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the content type to JSON
    header('Content-Type: application/json');

    // Assuming you receive JSON data from the client
    $data = json_decode(file_get_contents('php://input'), true);

    // Example data structure expected from client-side JavaScript
    $orderItems = $data['cart'];

    // Validate order data
    if (!isset($orderItems) || !is_array($orderItems) || empty($orderItems)) {
        $response = [
            'status' => 'error',
            'message' => 'Invalid order data.'
        ];
        http_response_code(400); // Bad Request
        echo json_encode($response);
        exit();
    }

    try {
        // Establish database connection using PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $pdo->beginTransaction();

        // Insert a new order into the orders table and retrieve its order_id
        $stmt = $pdo->prepare("INSERT INTO orders () VALUES ()");
        $stmt->execute();
        $orderId = $pdo->lastInsertId();

        // Insert each order item into the database
        foreach ($orderItems as $item) {
            if (!isset($item['food_id']) || !isset($item['quantity'])) {
                throw new Exception('Invalid order item data.');
            }
            $foodId = $item['food_id'];
            $quantity = $item['quantity'];

            // Example SQL query to insert into order_item table
            $stmt = $pdo->prepare("INSERT INTO order_item (order_id, food_id, quantity) VALUES (:order_id, :food_id, :quantity)");
            $stmt->execute([
                'order_id' => $orderId,
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
            'message' => 'Error placing order. Please try again later.',
            'error' => $e->getMessage() // Include the error message for debugging
        ];
        http_response_code(500); // Internal Server Error
        echo json_encode($response);
        exit();
    } catch (Exception $e) {
        // Handle other exceptions
        $response = [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
        http_response_code(400); // Bad Request
        echo json_encode($response);
        exit();
    }
} else {
    // Return a method not allowed error if not a POST request
    http_response_code(405); // Method Not Allowed
    header('Content-Type: application/json');
    $response = [
        'status' => 'error',
        'message' => 'Method not allowed.'
    ];
    echo json_encode($response);
    exit();
}
?>
