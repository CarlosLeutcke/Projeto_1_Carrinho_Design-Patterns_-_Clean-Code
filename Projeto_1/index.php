<?php

require_once 'classes/Product.php';
require_once 'classes/CartItem.php';
require_once 'classes/Cart.php';
require_once 'classes/LogError.php';


$products = [
    new Product(1, "Camiseta", 59.99, 10),
    new Product(2, "Calça Jeans", 129.99, 5),
    new Product(3, "Tênis", 199.99, 3)
];

$logError = new LogError();
$cart = new Cart($logError);

echo "<h3>Cart Items:</h3>";

$cart->addProduct($products[0], 2); 

$cart->addProduct($products[2], 10);

$cart->applyDiscount("DESCONTO10");

if (empty($cart->getItems())) {
    echo "<b>Carrinho vazio!</b><br>";
} else {
    foreach ($cart->getItems() as $item) {
        echo $item->getProduct()->getName() . 
             " - Quantidade: " . $item->getQuantity() .
             " - Preço unitário: " . $item->getProduct()->getPrice() .
             " - Subtotal: " . $item->getSubtotal() . "<br>";
    }

    echo "<b>Total com desconto:</b> " . number_format($cart->getTotal(), 2, ',', '.') . "<br><br>";
}

$logError->show();
