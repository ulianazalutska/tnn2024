<?php
  require('./cfg/conn.php');

  function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $full_name = clean_input($_POST['full_name']);
    $email = clean_input($_POST['email']);
    $phone_number = clean_input($_POST['phone_number']);
    $birth_date = clean_input($_POST['birth_date']);
    $grade_level = (int) clean_input($_POST['grade_level']);
    $gender = clean_input($_POST['gender']);

    $stmt = $conn->prepare("UPDATE students SET full_name = ?, email = ?, phone_number = ?, birth_date = ?, grade_level = ?, gender = ? WHERE id = ?");
    $stmt->bind_param("ssssisi", $full_name, $email, $phone_number, $birth_date, $grade_level, $gender, $id);

    if ($stmt->execute()) {
      header("Location: index.php");
      exit();
    }
    echo "Error: " . $stmt->error;
    exit();
  }

  $id = (int) ($_GET['edit'] ?? 0);
  $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $student = $stmt->get_result()->fetch_assoc();

  if (!$student) {
    header("Location: index.php");
    exit();
  }

  include('header.php');
  require('main.php');
?>
    <div class="modal active" id="edit-modal">
      <div class="modal-content">
        <a href="index.php" class="close"><i class="ri-close-large-fill"></i></a>
        <h2 class="modal__title">Edit student</h2>

      <form action="update.php" method="POST" class="form" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $student['id'] ?>">

        <div class="column">
          <div class="input-box marginzero">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo $student['full_name'] ?>" required>
          </div>
          <div class="input-box">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo $student['email'] ?>" required>
          </div>
        </div>

        <div class="column">
          <div class="input-box">
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $student['phone_number'] ?>" required>
          </div>
          <div class="input-box">
            <label for="birth_date">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date" value="<?php echo $student['birth_date'] ?>" required
              min="1925-01-01" max="2018-12-31">
          </div>
        </div>

        <div class="input-box">
          <label for="grade_level">Grade Level</label>
          <input type="number" id="grade_level" name="grade_level" min="1" max="5" value="<?php echo $student['grade_level'] ?>" required>
        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="Male" <?php echo $student['gender'] === 'Male' ? 'checked' : '' ?>>
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="Female" <?php echo $student['gender'] === 'Female' ? 'checked' : '' ?>>
              <label for="check-female">Female</label>
            </div>
          </div>
        </div>

        <button type="submit">Save</button>
      </form>
      </div>
    </div>

    <script src="js/swiper-bundle.min.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>
