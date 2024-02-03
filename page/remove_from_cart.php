<?php
session_start();
// Function to remove item from session cart
function removeFromCart($id) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] === $id) {
            unset($_SESSION['cart'][$key]); // Remove item from session cart
            break; // Exit loop once item is found and removed
        }
    }
}

// Check if 'id' parameter is set and call removeFromCart() function
if (isset($_GET['id'])) {
    removeFromCart($_GET['id']);
}

header('Location: http://localhost/E-commerce_php/page/cart.php');
exit();