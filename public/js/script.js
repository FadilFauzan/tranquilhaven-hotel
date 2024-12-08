const formTitle = document.getElementById('form-title');
const submitButton = document.getElementById('submit-button');
const toggleLink = document.getElementById('toggle-link');
const nameField = document.getElementById('name-field');

let isLogin = true;

toggleLink.addEventListener('click', () => {
  isLogin = !isLogin;
  if (isLogin) {
    formTitle.innerText = 'Login';
    submitButton.value = 'Login';
    toggleLink.innerHTML = "Don't have an account? <a href='#' id='toggle-link'>Register here</a>";
    nameField.style.display = 'none';
  } else {
    formTitle.innerText = 'Register';
    submitButton.value = 'Register';
    toggleLink.innerHTML = 'Already have an account? <a href="#" id="toggle-link">Login here</a>';
    nameField.style.display = 'block';
  }
});
