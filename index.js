document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    let valid = true;

    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    const emailInput = form.querySelector('input[type="email"]');
    const phoneInput = form.querySelector('input[name="phone"]');

    const emailWarning = document.getElementById('email-warning');
    const phoneWarning = document.getElementById('phone-warning');

    // Clear previous warnings
    emailWarning.textContent = '';
    phoneWarning.textContent = '';

    inputs.forEach(function (input) {
      if (input.value.trim() === '') {
        valid = false;
        input.style.borderColor = 'red';
      } else {
        input.style.borderColor = '';
      }
    });

    // Email validation - only allow Gmail
    if (emailInput) {
      const emailValue = emailInput.value.trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(emailValue)) {
        valid = false;
        emailInput.style.borderColor = 'red';
        emailWarning.textContent = 'Please enter a valid email address.';
      } else if (!/@gmail\.com$/i.test(emailValue)) {
        valid = false;
        emailInput.style.borderColor = 'red';
        emailWarning.textContent = 'Only Gmail addresses are allowed (must end with @gmail.com).';
      }
    }

    // Phone validation
    if (phoneInput) {
      const phoneValue = phoneInput.value.trim();
      const phonePattern = /^[6-9]\d{9}$/;

      if (!phonePattern.test(phoneValue)) {
        valid = false;
        phoneInput.style.borderColor = 'red';
        phoneWarning.textContent = 'Please enter a valid 10-digit Indian phone number.';
      }
    }

    if (!valid) {
      e.preventDefault();
    }
  });
});
