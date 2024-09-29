<?php
  $conn = new mysqli('localhost', 'root', '', 'tnn');


  if ($conn->connect_error) {
      die("Connect error: " . $conn->connect_error);
  }
?>