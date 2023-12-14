<?php
session_start();

if (isset($_SESSION['id'])) {
    $con = mysqli_connect('localhost', 'root', '', 'test') or die('Unable To connect');
    $userId = $_SESSION['id'];
    $order = $_POST['order'];
    $amount = $_POST['amount'];

    if ($_SESSION["hasGoldSubscription"]) {
        echo "<h1> Hurray ! You are getting 10 % discount. You are gold member ! </h1><br>";
        $amount = 0.9 * $amount;
    } else {
        
    }

    // Update status to 1 in the gold table
    $updateStatusQuery = "INSERT INTO ORDERS values ('".$userId."','".$order."','".$amount."')";
    //  debugging !echo $updateStatusQuery;
    $updateStatusResult = mysqli_query($con, $updateStatusQuery);

    if ($updateStatusResult) {
        echo "<h1> You are paying Rs.".$amount."</h1>";

        echo "<br><br><a href='index.php'> Go Back (after payment...) </a>";
    } else {
        //echo "Error updating gold status: " . mysqli_error($con);
    }
} else {
    echo "Invalid session!";
}
?>

