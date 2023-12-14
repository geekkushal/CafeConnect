<?php
session_start();
$message = "";

if (count($_POST) > 0) {
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'test') or die('Unable To connect');

    $username = mysqli_real_escape_string($con, $_POST["user_name"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Check if the username already exists
    $checkUser = mysqli_query($con, "SELECT * FROM login_user WHERE user_name='$username'");
    if (mysqli_num_rows($checkUser) > 0) {
        $message = "Username already exists. Please choose a different one.";
    } else {
        // Insert new user into the database
        $insertUser = mysqli_query($con, "INSERT INTO login_user (user_name, password) VALUES ('$username', '$password')");
        $insertSt = mysqli_query($con,"insert into gold(status) values (0)");
        if ($insertUser) {
            $message = "Signup successful! You can now log in.";
            // Redirect to login page or user dashboard if needed
            // header("Location: login.php");
        } else {
            $message = "Error in signup. Please try again.";
        }
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
    <title>User Signup</title>
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
    <h1>User Signup</h1>
</header>

<main>
    <form name="frmUser" method="post" action="">
        <div class="message"><?php if ($message != "") {
            echo $message;
        } ?></div>
        <h3>Enter Signup Details</h3>
        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Signup">
        <input type="reset">
    </form>
    <?php
    if (!isset($_SESSION["id"])) {
        echo '<p>Already a member? <a href="login.php">Login here</a>.</p>';
    }
    ?>
</main>

</body>
</html>
