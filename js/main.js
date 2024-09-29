/*=============== SWIPER SERVICES ===============*/ 
const swiperServices = new Swiper('.home__swiper', {
  loop: true,
  grabCursor: true,
  spaceBetween: 24,
  slidesPerView: 'auto',

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  keyboard: {
      // вкл / вкл
      enbled: true,
      onlyInViewport: true,
      pageUpDown: true,
    },


});

// MODAL WINDOW

const modal = document.getElementById("modal");
const addNewButton = document.getElementById("add-new");
const closeModalButton = document.getElementById("close-modal");


addNewButton.onclick = function() {
    modal.classList.add("active");
    modal.querySelector('.modal-content').style.animation = 'fadeInForm 0.5s 0.5s forwards';
    modal.style.animation = 'fadeInBackground 0.5s forwards'; 
}

closeModalButton.onclick = function() {
    modal.querySelector('.modal-content').style.animation = 'fadeOutForm 0.5s forwards';
    modal.style.animation = 'fadeOutBackground 0.5s forwards';

    modal.querySelector('.modal-content').addEventListener('animationend', () => {
        if (!modal.classList.contains('active')) {
            modal.querySelector('.modal-content').style.animation = ''; 
        }
    });

    modal.addEventListener('animationend', () => {
        if (!modal.classList.contains('active')) {
            modal.style.animation = ''; 
        }
    });

    setTimeout(() => {
        modal.classList.remove("active");
    }, 500); 
}


window.onclick = function(event) {
    if (event.target === modal) {
        closeModalButton.onclick(); 
    }
}

// VALIDATIONS
document.getElementById('myForm').addEventListener('submit', function(event) {

    const fullName = document.getElementById('full_name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phoneNumber = document.getElementById('phone_number').value.trim();
    const birthDate = document.getElementById('birth_date').value;
    const gradeLevel = document.getElementById('grade_level').value;

    const phonePattern = /^\d{11}$/;

    if (fullName === '') {
      alert('Full Name is required');
      event.preventDefault();
      return;
    }

    if (email === '') {
      alert('Email Address is required');
      event.preventDefault();
      return;
    }

    if (!phonePattern.test(phoneNumber)) {
      alert('Phone number must be a valid 11-digit number');
      event.preventDefault();
      return;
    }


    const minDate = new Date('1925-01-01');
    const maxDate = new Date('2018-12-31');
    const userBirthDate = new Date(birthDate);
    if (userBirthDate < minDate || userBirthDate > maxDate) {
      alert('Birth date must be between 1925 and 2018');
      event.preventDefault();
      return;
    }

    if (gradeLevel < 1 || gradeLevel > 5) {
      alert('Grade Level must be between 1 and 5');
      event.preventDefault();
      return;
    }


  });