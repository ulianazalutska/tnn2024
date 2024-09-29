<?php
include "./cfg/conn.php";

$id = $_GET['delete'];
$sql = "DELETE FROM students WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: index.php");
exit();
?>
