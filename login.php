<?php
session_start();
include "cfg/conn.php"; 
$email = $pwd = "";
$email_err = $pwd_err = "";
$error = false; 
$error_msg = "";

if (isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);


    $remember = isset($_POST['remember']) ? $_POST['remember'] : null;

   
    if ($email == ""){
        $email_err = "Email is mandatory";
        $error = true;
    }

    if ($pwd == ""){
        $pwd_err = "Password is mandatory";
        $error = true;
    }

    
    if (!$error){
        $sql = "SELECT * FROM users WHERE email = ?";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stored_pwd = $row['password'];

                
                if (password_verify($pwd, $stored_pwd)) {
                    
                    if ($remember) {
                        
                        setcookie("remember_email", $email, time() + 365 * 24 * 3600);
                        setcookie("remember", $remember, time() + 365 * 24 * 3600);
                    } else {
                       
                        setcookie("remember_email", "", time() - 3600);
                        setcookie("remember", "", time() - 3600);
                    }

                   
                    $_SESSION['user_id'] = $row['id'];  
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];

                    
                    header("location: index.php");
                    exit();
                } else {
                    
                    $error_msg = "Incorrect password.";
                }
            } else {
                
                $error_msg = "Email not registered.";
            }
        } catch (Exception $e) {
            $error_msg = "Error: " . $e->getMessage();
        }
    }
}

include "header.php";
?>
<section class="register" id="register">
    <div class="home__triangle home__triangle-1"></div>
    
    <div class="register__container container grid">
       <div class="err-msg">

        <?php if (!empty($error_msg)){ ?>
            <div class="alert alert-danger">
                <?= $error_msg?>
            </div>
        <?php } ?>

    </div>
      <div class="form-content">
        <h2 class="form__title">Log In</h2>
        <form action="" method="post" class="form" autocomplete="off">
          <?php
             $display_email = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : $email;

             $checked = !empty($remember) ? "checked" : (isset($_COOKIE['remember']) ? "checked" : "");
            ?>
            <div class="mb-3 input-form ">
              <label for="email">Email</label>
              <input 
              type="text" 
              id="email" 
              name="email" 
              placeholder="Enter email" 
              value="<?=$display_email?>">

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
            <div class="form-check">
              <input
                  class="form-check-input"
                  name="remember"
                  id=""
                  type="checkbox"
                  value="checkedValue"
                  aria-label="Remember Me"
                  <?= $checked?>
              />Remember Me
            </div>
            <button
                type="submit"
                name = "submit"
                class="btn btn-primary">
                Login
            </button>
             <p class="min-text">Not Registered? Click <a href="register.php">here</a> to register</p>
        </form>
      </div>
</section>

</body>
</html>