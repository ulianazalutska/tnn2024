<?php
  require('./cfg/conn.php');

  function clean_input($data) {
    $data = trim($data);     
    $data = stripslashes($data);              
    $data = htmlspecialchars($data);          
    return $data;
  }

  $full_name = clean_input($_POST['full_name']);
  $email = clean_input($_POST['email']);
  $phone_number = clean_input($_POST['phone_number']);
  $birth_date = clean_input($_POST['birth_date']);
  $grade_level = clean_input($_POST['grade_level']);
  $gender = clean_input($_POST['gender']);

  $stmt = $conn->prepare("INSERT INTO students (full_name, email, phone_number, birth_date, grade_level, gender) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssis", $full_name, $email, $phone_number, $birth_date, $grade_level, $gender);

  if ($stmt->execute()) {
    header("Location: index.php");
    } else {
    echo "Error: " . $stmt->error;
  }

$stmt->close();
$conn->close();
?>