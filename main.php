<main class="main">
  <section class="home section" id="home">
    <div class="home__triangle home__triangle-1"></div>

    <div class="home__container container grid">
      
      <div class="home__data">
        <div>
          <h2 class="section__title">TECHNIK PROGRAMISTA</h2>
        </div>
        <a href="#contact" class="button addnew" id="add-new">add new</a>

        <div class="modal" id="modal">
          <div class="modal-content">
            <span class="close" id="close-modal">
              <i class="ri-close-large-fill"></i>
            </span>
            <h2 class="modal__title">Add a new student</h2>

          <form action="insert.php" method="POST" class="form" autocomplete="off" id="myForm">
            <div class="column">
              <div class="input-box marginzero">
                <label for="#">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter full name" required>
              </div>
              <div class="input-box">
                <label for="#">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
              </div>
            </div>

            <div class="column">
              <div class="input-box">
                <label for="#">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Enter phone number" required>
              </div>
              <div class="input-box">
                <label for="#">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" placeholder="Enter birth date" required
                  min="1925-01-01" max="2018-12-31">
              </div>
            </div>

            <div class="input-box">
              <label for="#">Grade Level</label>
              <input type="number" id="grade_level" name="grade_level" min="1" max="5" placeholder="Enter grade level" required>
            </div>

            <div class="gender-box">
              <h3>Gender</h3>
              <div class="gender-option">
                <div class="gender">
                  <input type="radio" id="check-male" name="gender" value="Male" checked>
                  <label for="check-male">Male</label>
                </div>
                <div class="gender">
                  <input type="radio" id="check-female" name="gender" value="Female">
                  <label for="check-female">Female</label>
                </div>
              </div>
            </div>
            <button type="submit">Submit</button>
          </form>


          </div>
        </div>

      </div>

      <div class="home__swiper swiper">
        <div class="swiper-wrapper">
          <?php
            require('./cfg/conn.php');
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);
            $start = 0; 
            $num = $start + 1;
            if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <article class="home__card swiper-slide">
                <span class="liczba"><?php echo $num ?></span>
                <div class="card-header">
                  <h2><?php echo $row["full_name"] ?></h2>
                  <p>Gender: <?php echo $row["gender"] ?></p>
                </div>

                <div class="profile-body">
                  <p>
                    <strong>Birth date:</strong>
                    <span><?php echo $row["birth_date"] ?></span>
                  </p>
                  <p><strong>Email:</strong> <span><?php echo $row["email"] ?></span></p>
                  <p><strong>Phone number:</strong> <span><?php echo $row["phone_number"] ?></span></p>
                  <p><strong>Grade level:</strong> <span><?php echo $row["grade_level"] ?></span></p>
                </div>

                <div class="card__icons">
                  <a href="update.php?edit=<?php echo $row['id'] ?>"><i class="ri-edit-box-line"></i></a>
                  <a href="delete.php?delete=<?php echo $row['id'] ?>" class="delete-link"><i class="ri-delete-bin-line"></i></a>
                </div>
              </article>
          <?php
          $num++;
               }
            }
          ?>
        </div>  
        <!-- navigation button -->
        <div class="swiper-button-prev">
          <i class="ri-arrow-left-line"></i>
        </div>
        <div class="swiper-button-next">
          <i class="ri-arrow-right-line"></i>
        </div>
      </div>
    </div>
  </section>
</main>