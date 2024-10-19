<?php 
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
session_start() 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="css/swiper-bundle.min.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="./css/styles11.css">

  <title>Terra Nova | 4-A</title>
</head>
  <body>
<header class="header" id="header">
  <nav class="nav container">
    
    <a href="index.php" class="nav__logo">
      <span>Terra Nova 4-A</span>
    </a>
    <?php if (isset($_SESSION['name'])){ ?>
      <div class="user">
        <a href="user.php" class="profile-icon">
            <i class="ri-user-fill"></i>
        </a>
      </div>
    <?php } else { ?>
    <div class="nav__link" id="nav-link">
      <ul class="nav__list">
        
        <li class="nav__item"><a href="login.php" class="nav__link">Log In |</a></li>
        <li class="nav__item"><a href="register.php" class="nav__link"> Sign Up</a></li>
      </ul>
    </div>
    <?php } ?>
  </nav>
</header>