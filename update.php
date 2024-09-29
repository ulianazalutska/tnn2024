<?php
require('header.php');
include './cfg/conn.php';

$id = $_GET['edit'];

$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $grade_level = $_POST['grade_level'];

    // SQL-запит для оновлення даних
    $sql = "UPDATE users SET full_name='$full_name', gender='$gender', birth_date='$birth_date', email='$email', phone_number='$phone_number', grade_level='$grade_level' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully.";
        header("Location: index.php"); // Перенаправлення на головну сторінку
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<link rel="stylesheet" href="./css/styles1.css">
<form method="POST" action="">
    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name" value="<?php echo $user['full_name']; ?>" required><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select><br>

    <label for="birth_date">Birth Date:</label>
    <input type="date" id="birth_date" name="birth_date" value="<?php echo $user['birth_date']; ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

    <label for="phone_number">Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>" required><br>

    <label for="grade_level">Grade Level:</label>
    <input type="number" id="grade_level" name="grade_level" value="<?php echo $user['grade_level']; ?>" required><br>

    <button type="submit">Update User</button>
</form>
