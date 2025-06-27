<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manali Trip Registration</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="snow"></div>
  <div class="container">
    <h2>🚞 Manali Trip Registration Form</h2>
    <form action="submit.php" method="post" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="👤 Your name" required>
      <input type="number" name="age" placeholder="🎂 Your age" required>

      <input type="file" name="photo" accept="image/*" required style="color: white;">

      <select name="gender" required>
        <option value="">🚻 Select gender</option>
        <option value="Male">♂️ Male</option>
        <option value="Female">♀️ Female</option>
        <option value="Other">⚧️ Other</option>
      </select>

      <input type="email" name="email" placeholder="📧 Your email" required>
      <input type="text" name="phone" placeholder="📞 Your phone" required>

      <textarea name="desc" placeholder="📝 Anything else?" rows="4"></textarea>

      <button class="btn" type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
    </form>

    <a href="view.php" class="view-btn"><i class="fas fa-eye"></i> View Submissions</a>
  </div>
</body>
<script src="index.js"></script>
</html>
