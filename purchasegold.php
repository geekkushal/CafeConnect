<?php
session_start();

if (isset($_SESSION['id'])) {
    $con = mysqli_connect('localhost', 'root', '', 'test') or die('Unable To connect');
    $userId = $_SESSION['id'];

    // Update status to 1 in the gold table
    $updateStatusQuery = "UPDATE gold SET status = 1 WHERE id = $userId";
    $updateStatusResult = mysqli_query($con, $updateStatusQuery);

    if ($updateStatusResult) {
        header("Location: logout.php");
        exit();
    } else {
        echo "Error updating gold status: " . mysqli_error($con);
    }
} else {
    echo "Invalid session!";
}
?>
