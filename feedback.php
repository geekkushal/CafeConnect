<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Food Website</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
}

#menu-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.menu-item {
    border: 1px solid #ddd;
    padding: 20px;
    margin: 20px;
    text-align: center;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.menu-item:hover {
    transform: scale(1.05);
}

.menu-item img {
    max-width: 100%;
    border-radius: 8px;
}

.price {
    font-weight: bold;
    color: #4CAF50;
}

.cart {
    border: 1px solid #333;
    padding: 20px;
    position: fixed;
    top: 0;
    right: 0;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 0 0 0 8px;
}

.cart ul {
    list-style-type: none;
    padding: 0;
}

.cart button {
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 4px;
    margin-top: 10px;
}

.feedback {
    border: 1px solid #333;
    padding: 20px;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.feedback form {
    display: flex;
    flex-direction: column;
    max-width: 300px;
    margin: 0 auto;
}

.feedback label {
    margin-bottom: 10px;
    font-weight: bold;
}

.feedback input,
.feedback textarea {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.feedback .butt {
    background-color: #4CAF50;
    color: white;
    padding: 15px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

.feedback .butt:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <header>
        <h1>Menu</h1>
    </header>

    <section id="menu-container">
    </section>

    

    <div class="feedback">
        <h2>Customer Feedback</h2>
        <form id="feedback-form" action="feedback_kushal.php" method="POST">
            <label for="customerName">Your Name:</label>
            <input type="text" id="customerName" name="customerName" required>

            <label for="feedbackMessage">Feedback:</label>
            <textarea id="feedbackMessage" name="feedbackMessage" rows="4" required></textarea>

            <input class = "butt" type="submit" value="Submit Feedback">
        </form>
    </div>


</body>
</html>