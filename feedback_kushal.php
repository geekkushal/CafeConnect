<?php
session_start();

if (isset($_SESSION['id'])) {
    $con = mysqli_connect('localhost', 'root', '', 'test') or die('Unable To connect');
    $userId = $_SESSION['id'];
    $feedback = $_POST['feedbackMessage'];
    // Update status to 1 in the gold table
    $updateStatusQuery = "INSERT INTO feedback values('". $userId ."','".$feedback."')";
    $updateStatusResult = mysqli_query($con, $updateStatusQuery);

    if ($updateStatusResult) {
        echo "<script>alert('Feedback Submitted :) ');</script>";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating feedback table: " . mysqli_error($con);
    }
} else {
    echo "Invalid session!";
}
?>
