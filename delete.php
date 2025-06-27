<?php
$conn = mysqli_connect("localhost", "root", "", "trip");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "DELETE FROM registrations WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: view.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>