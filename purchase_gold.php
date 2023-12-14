<?php
session_start();
$message = "";

if (isset($_POST['pay'])) {
    // Dummy payment logic
    // ... Add your payment gateway integration code here ...

    // Update the user to gold status in the database
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'test') or die('Unable To connect');
    $userId = $_SESSION['id'];
    $updateGoldStatus = mysqli_query($con, "UPDATE gold SET status = 1 WHERE id = $userId");

    if ($updateGoldStatus) {
        $_SESSION['hasGoldSubscription'] = true;
        $message = "Congratulations! You are now a gold member.";
    } else {
        $message = "Error updating gold status. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Gold</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 1rem;
        }

        main {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .butt {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .message {
            color: #e74c3c;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION["name"])) {
    ?>
    <header>
        <h1>Purchase Gold</h1>
        <a href="index.php">Go back to Dashboard</a>
    </header>

    <main>
    <div class="message"><?php echo $message; ?></div>
    <p>Upgrade to Gold Membership for exclusive benefits!</p>
    <form id="paymentForm" method="post" action="purchasegold.php">
        <input class = "butt" type="submit" value="Make Payment">
        <input type="hidden" name="pay" value="1">
        
    </form>
</main>

    <?php
} else {
    header("Location: login.php");
    exit; // Ensure that the rest of the page doesn't get executed
}
?>


</body>
</html>
