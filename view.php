<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "trip";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registrations ORDER BY dt DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Submissions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
<div class="snow"></div>

<div class="table-container">
  <h2><i class="fas fa-file-alt"></i> All Submissions</h2>
  <div class="add-btn-wrapper">
  <a href="index.php" class="add-btn"><i class="fas fa-user-plus"></i> Add Person</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>Serial No.</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Description</th>
        <th>Submitted At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result && $result->num_rows > 0) {
          $sn = 1;
          while ($row = $result->fetch_assoc()) {
              $imgPath = !empty($row['photo']) ? $row['photo'] : 'default.png';
              echo "<tr>
                      <td>{$sn}</td>
                      <td><img src='{$imgPath}' class='user-img' onclick='showPopup(\"{$imgPath}\")'></td>
                      <td>{$row['name']}</td>
                      <td>{$row['age']}</td>
                      <td>{$row['gender']}</td>
                      <td>{$row['email']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['description']}</td>
                      <td>{$row['dt']}</td>
                      <td>
                          <a href='view_detail.php?id={$row['id']}' class='action-btn eye-btn' style='color: white;' title='View'><i class='fas fa-eye'></i></a>
                          <a href='edit.php?id={$row['id']}' class='action-btn edit-btn' title='Edit'><i class='fas fa-edit'></i></a>
                          <a href='delete.php?id={$row['id']}' class='action-btn delete-btn' title='Delete' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash-alt'></i></a>
                      </td>
                    </tr>";
              $sn++;
          }
      } else {
          echo "<tr><td colspan='10'>No records found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<div class="img-popup" id="imgPopup">
  <span class="close-popup" onclick="hidePopup()">&times;</span>
  <img id="popupImage" src="" alt="Popup">
</div>

<script>
function showPopup(src) {
    document.getElementById('popupImage').src = src;
    document.getElementById('imgPopup').classList.add('active');
}

function hidePopup() {
    document.getElementById('imgPopup').classList.remove('active');
}

function showDetails(data) {
  document.getElementById("modalName").textContent = data.name;
  document.getElementById("modalAge").textContent = data.age;
  document.getElementById("modalGender").textContent = data.gender;
  document.getElementById("modalEmail").textContent = data.email;
  document.getElementById("modalPhone").textContent = data.phone;
  document.getElementById("modalDescription").textContent = data.description;
  document.getElementById("modalDt").textContent = data.dt;

  // If image path exists
  if (data.photo) {
    document.getElementById("modalImage").src = data.photo;
    document.getElementById("modalImage").style.display = "block";
  } else {
    document.getElementById("modalImage").style.display = "none";
  }

  document.getElementById("detailsModal").style.display = "block";
}

function closeModal() {
  document.getElementById("detailsModal").style.display = "none";
}
</script>

<div id="detailsModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>User Details</h3>
    <img id="modalImage" src="" alt="User Photo" style="max-width: 150px; border-radius: 8px; margin-bottom: 15px;">
    <p><strong>Name:</strong> <span id="modalName"></span></p>
    <p><strong>Age:</strong> <span id="modalAge"></span></p>
    <p><strong>Gender:</strong> <span id="modalGender"></span></p>
    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
    <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
    <p><strong>Description:</strong> <span id="modalDescription"></span></p>
    <p><strong>Submitted At:</strong> <span id="modalDt"></span></p>
  </div>
</div>


</body>
</html>

<?php
$conn->close();
?>