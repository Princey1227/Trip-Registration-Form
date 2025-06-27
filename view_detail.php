<?php
$conn = mysqli_connect("localhost", "root", "", "trip");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "SELECT * FROM registrations WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>View Details</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <div class="bg-image"></div>

  <div class="container">
    <h2>👁️ View Submission Details</h2>
    <form>
      <img src="<?= !empty($data['photo']) ? $data['photo'] : 'default.png' ?>" alt="Uploaded Photo" style="max-width: 150px; margin-bottom: 15px; border-radius: 8px;">

      <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" readonly>
      <input type="number" name="age" value="<?= htmlspecialchars($data['age']) ?>" readonly>
      <input type="text" name="gender" value="<?= htmlspecialchars($data['gender']) ?>" readonly>
      <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" readonly>
      <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" readonly>
      <textarea rows="4" readonly><?= htmlspecialchars($data['description']) ?></textarea>
      <input type="text" value="Submitted at: <?= htmlspecialchars($data['dt']) ?>" readonly>

      <a href="view.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
    </form>
  </div>
</body>
</html>

<?php mysqli_close($conn); ?>
