<?php
$conn = mysqli_connect("localhost", "root", "", "trip");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle image upload first
$photoPath = "";
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
    }

    $filename = basename($_FILES["photo"]["name"]);
    $targetFile = $targetDir . time() . "_" . $filename;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        $photoPath = $targetFile;
    } else {
        die("❌ Error uploading photo.");
    }
}

// Collect form data
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

// Insert into database with image path
$sql = "INSERT INTO registrations (name, age, gender, email, phone, description, dt, photo)
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp(), '$photoPath')";

if (mysqli_query($conn, $sql)) {
    echo "✅ Form submitted successfully!<br><a href='view.php'>View Submissions</a>";
} else {
    echo "❌ Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
