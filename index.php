<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 1rem;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION["name"])) {
    ?>
    <header>
        <h1>Welcome, <?php echo $_SESSION["name"]; ?>!</h1>
        <a href="logout.php"><img src="logout.png" alt="logout"></a>
    </header>

    <main>
        <?php
        if ($_SESSION["hasGoldSubscription"]) {
            echo "<p>You are a gold member. Enjoy exclusive benefits!</p>";
        } else {
            echo "<p>You are not a gold member. <a href='purchase_gold.php'>Purchase Gold Subscription</a></p>";
        }
        ?>
        <main>
    

    <h2>Menu</h2>
    <p>Explore our delicious menu and place your order.</p>
    <a href="menu.php">View Menu</a>

    <h2>Order System</h2>
    <p>Place your order here for a quick and convenient service.</p>
    <a href="order.php">Place Order</a>

    <h2>Feedback</h2>
    <p>Share your experience with us. Your feedback is valuable!</p>
    <a href="feedback.php">Give Feedback</a>
    
    <!-- Other content for the user dashboard can be added here -->
</main>

    </main>
    <?php
} else {
    header("Location: login.php");
    exit; // Ensure that the rest of the page doesn't get executed
}
?>

<footer>
    &copy; <?php echo date("Y"); ?> CafeConnect by Kushal
</footer>

</body>
</html>
