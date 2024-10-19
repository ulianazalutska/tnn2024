<?php
  include "cfg/conn.php";
  $name = $email = $pwd = $conf_pwd = "";
  $name_err = $email_err = $pwd_err = $conf_pwd_err = "";
  $error = false; 
  $err_msg = "";
  
  if (isset($_POST['submit'])){
  
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $pwd = trim($_POST['pwd']);
      $conf_pwd = trim($_POST['conf_pwd']);
      // validate fields
      if ($name == ""){
          $name_err = "Name is mandatory";
          $error = true;
      }
  
      if ($email == ""){
          $email_err = "Email is mandatory";
          $error = true;
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $email_err = "Invalid Email format";
              $error = true;
          }
      else{   // check if email already registered
          $sql = "select * from users where email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s",$email);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows >0){
              $email_err = "Email already registered";
              $error = true;
          } 
      }
  
      if ($pwd == ""){
          $pwd_err = "Passqword is mandatory";
          $error = true;
      }
      elseif (strlen($pwd) < 6) {
          $pwd_err = "Password must be atleast 6 characters";
          $error = true;
          }
      
      if ($conf_pwd == ""){
          $conf_pwd_err = "Confirm Password is mandatory";
          $error = true;
      }
  
      if ($pwd !="" && $conf_pwd !=""){
          if ($pwd != $conf_pwd){
              $conf_pwd_err = "Passwords do not match";
              $error = true;
          }
      }
  
        // all validations passed
        if (!$error){
          $pwd = password_hash($pwd, PASSWORD_DEFAULT);
  
          $sql = "insert into users (name, email, password) value(?, ?, ?)";
          try{
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("sss", $name, $email, $pwd);
              $stmt->execute();
              $succ_msg = "Registration successful. Please <a href='login.php'>login</a>";
              $name = $email ="";
          }
          catch(Exception $e){
              $error_msg = $e->getMessage();
          }
  
      }
  }
  include "header.php";
  ?>
  <section class="register" id="register">
    <div class="home__triangle home__triangle-1"></div>
    
    <div class="register__container container grid">
      
      <div class="err-msg">
          <?php if (!empty($succ_msg)){ ?>
              <div class="alert alert-success">
                  <?= $succ_msg?>
              </div>
          <?php } ?>
  
          <?php if (!empty($error_msg)){ ?>
              <div class="alert alert-danger">
                  <?= $error_msg?>
              </div>
          <?php } ?>
  
      </div>
      <div class="form-content">
        <h2 class="form__title">Sign Up</h2>
        <form action="" method="post" class="form" autocomplete="off">
          <div class="mb-3 input-form ">
            <label for="name">Name</label>
            <input 
            type="text" 
            id="name" 
            name="name" 
            placeholder="Enter name" 
            value="<?=$name?>">

            <div class="input-err text-danger"><?= $name_err?></div>
          </div>
          <div class="mb-3 input-form ">
            <label for="email">Email</label>
            <input 
            type="text" 
            id="email" 
            name="email" 
            placeholder="Enter email" 
            value="<?=$email?>">

            <div class="input-err text-danger"><?= $email_err?></div>
          </div>
          <div class="mb-3 input-form ">
            <label for="pwd">Password</label>
            <input 
            type="password" 
            id="pwd" 
            name="pwd" 
            placeholder="Enter password">

            <div class="input-err text-danger"><?= $pwd_err?></div>
          </div>
          <div class="mb-3 input-form ">
            <label for="conf_pwd">Confirm Password</label>
            <input 
            type="password" 
            id="conf_pwd" 
            name="conf_pwd" 
            placeholder="Enter Confirm password">

            <div class="input-err text-danger"><?= $conf_pwd_err?></div>
          </div>
          <div class="form-check">
            <input
                class="form-check-input"
                name=""
                id=""
                type="checkbox"
                value="checkedValue"
                aria-label="Show Password"
                onclick = "showPwd()"
            />Show Password
          </div>
          <button
              type="submit"
              name = "submit"
              class="btn-primary">
              Sign Up
          </button>
          <p class="min-text">Already Registered? Login <a href="login.php">here</a></p>
        </form>
      </div>
    </div>
  </section>
  <!-- Модальне вікно -->
<div id="customModal" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-close">&times;</span>
    <div class="custom-modal-body">
      <div class="custom-alert-msg"></div>
    </div>
  </div>
</div>

<!-- Скрипти -->
<script>
// Додаємо ваш JS код тут
</script>


  <script>
      function showPwd(){
          var pwd = document.getElementById("pwd");
          var conf_pwd = document.getElementById("conf_pwd");
          if (pwd.type === "password")
              pwd.type = "text";
          else
          pwd.type = "password"
  
          if (conf_pwd.type === "password")
              conf_pwd.type = "text";
          else
              conf_pwd.type = "password"
      }
  </script>
  </body>
  </html>    
