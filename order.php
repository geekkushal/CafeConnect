<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Food Website</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
}

#menu-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.menu-item {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px;
    text-align: center;
}

.menu-item img {
    max-width: 100%;
}

.price {
    font-weight: bold;
    color: green;
}

.cart {
    border: 1px solid #333;
    padding: 10px;
    position: fixed;
    top: 0;
    right: 0;
    background-color: #fff;
}

.cart ul {
    list-style-type: none;
    padding: 0;
}

.cart button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}
    </style>
</head>
<body>
    <header>
        <h1>Menu</h1>
    </header>

    <section id="menu-container">
        <!-- Menu items will be dynamically added here using JavaScript -->
    </section>

    <div class="cart">
        <h2>Shopping Cart</h2>
        <ul id="cart-items"></ul>
        <p>Total: Rs.<span id="cart-total">0.00</span></p>

        <form id="frm_kushal" action="order_kushal.php" method="post">
            <input type="hidden" name="amount" id="amountInput">
            <input type="hidden" name="order" id="orderInput">
        </form>
        <button onclick="checkout()">Checkout</button>
    </div>
    
    <script src="script.js"></script>
</body>
</html>