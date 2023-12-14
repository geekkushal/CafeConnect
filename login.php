<?php
session_start();
$message = "";

if (count($_POST) > 0) {
    $con = mysqli_connect('localhost', 'root', '', 'test') or die('Unable To connect');

    $result = mysqli_query($con, "SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' AND password='" . $_POST["password"] . "'");
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['user_name'];

        // Check if the user has a gold subscription
        $goldResult = mysqli_query($con, "SELECT * FROM gold WHERE id=" . $row['id']);
        $goldRow = mysqli_fetch_array($goldResult);

        if (is_array($goldRow) && $goldRow['status'] == 1) {
            $_SESSION["hasGoldSubscription"] = true;
        } else {
            $_SESSION["hasGoldSubscription"] = false;
        }

        header("Location: index.php");
    } else {
        $message = "Invalid Username or Password!";
    }
}

if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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

        form {
            text-align: left;
        }

        .message {
            color: #e74c3c;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>User Login</h1>
</header>

<main>
    <form name="frmUser" method="post" action="">
        <div class="message"><?php if ($message != "") {
            echo $message;
        } ?></div>
        <h3>Enter Login Details</h3>
        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset">
    </form>
    <?php
    if (!isset($_SESSION["id"])) {
        echo '<p>Not a member? <a href="signup.php">Sign up here</a>.</p>';
    }
    ?>
</main>

</body>
</html>
