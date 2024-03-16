function openPopup(id) {
    document.getElementById(id).style.display = 'flex';
}

function closePopupSignIn() {
    // document.getElementById('overlay').style.display = 'none';
    if (confirm("Is this information correct?")) {
        window.location.href = 'index.php';
    }
    document.getElementById('overlay').style.display = 'none';
}

function closePopup(id) {
    if (confirm("Is this information correct?")) {
        document.getElementById(id).style.display = 'none';
    }
}

function closePopupDone(id) {
    document.getElementById(id).style.display = 'none';
}

function openWeb(url){
    window.open(url);
}

async function loadNavbar() {
    const response = await fetch('/php/navbar.php');
    const navbarHtml = await response.text();
    document.getElementById("navbar").innerHTML = navbarHtml;
}

document.addEventListener('DOMContentLoaded', () => {
    const toggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('#navbarNav');

    toggler.addEventListener('click', () => {
        navbarCollapse.classList.toggle('show');
    });
});

function Login() {
    // Example JavaScript function to handle the form submission
    const phone = document.querySelector('input[id="phoneNumber"]');
    const password = document.querySelector('input[id="password"]');

    if (phone!="" && password!="") {
        alert('Phone Number: ' + phone.value + '\nPassword: ' + password.value);
        window.location.href = 'index.php'
    } else if (phone == "") {
        alert('Please fill your phone number.');
    } else if (password == "") {
        alert('Please fill your password.');
    } else {
        alert("Please fill out all fields.");
    }
}

function forNormal(){
    document.getElementById("accountNormal").ariaDisabled = true;
}

function forEdit(){
    document.getElementById("accountNormal").inputMode = false;
}