<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "trip";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM registrations WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $photoPath = $row['photo']; // Default to existing

    // Check if new image uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir);
        }

        $filename = basename($_FILES["photo"]["name"]);
        $targetFile = $targetDir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            $photoPath = $targetFile;
        }
    }

    $sql = "UPDATE registrations 
            SET name='$name', age='$age', gender='$gender', email='$email', phone='$phone', description='$desc', photo='$photoPath' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: view.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Submission</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="snow"></div>
<div class="container">
  <a href="view.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
  <h2><i class="fas fa-edit"></i> Edit Submission</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $row['name'] ?>" placeholder="Your name" required>
    <input type="number" name="age" value="<?= $row['age'] ?>" placeholder="Your age" required>

    <!-- Image display -->
    <?php if (!empty($row['photo'])): ?>
      <img src="<?= $row['photo'] ?>" alt="Current Image" style="max-width: 150px; margin-bottom: 10px; display:block;">
    <?php endif; ?>

    <input type="file" name="photo" accept="image/*">

    <select name="gender" required>
      <option value="">Select gender</option>
      <option value="Male" <?= $row['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
      <option value="Female" <?= $row['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
      <option value="Other" <?= $row['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
    </select>

    <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Your email" required>
    <input type="tel" name="phone" value="<?= $row['phone'] ?>" placeholder="Your phone" required>
    <textarea name="desc" placeholder="Anything else?" required><?= $row['description'] ?></textarea>
    <button type="submit"><i class="fas fa-edit"></i> Update</button>
  </form>
</div>
</body>
</html>
