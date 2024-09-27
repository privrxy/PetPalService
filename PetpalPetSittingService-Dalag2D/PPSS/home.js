document.addEventListener("DOMContentLoaded", () => {
    const adminLink = document.getElementById("admin");
    const userLink = document.getElementById("user");
    const adminModal = document.getElementById("adminModal");
    const userModal = document.getElementById("userModal");
    const signupModal = document.getElementById("signupModal");
    const adminClose = document.getElementById("adminClose");
    const userClose = document.getElementById("userClose");
    const signupClose = document.getElementById("signupClose");
    const showSignupModal = document.getElementById("showSignupModal");
    const showLoginModal = document.getElementById("showLoginModal");

    adminLink.addEventListener("click", (event) => {
        event.preventDefault();
        adminModal.style.display = "flex";
        userModal.style.display = "none";
        signupModal.style.display = "none";
    });

    userLink.addEventListener("click", (event) => {
        event.preventDefault();
        userModal.style.display = "flex";
        adminModal.style.display = "none";
        signupModal.style.display = "none";
    });

    adminClose.addEventListener("click", () => {
        adminModal.style.display = "none";
    });

    userClose.addEventListener("click", () => {
        userModal.style.display = "none";
    });

    signupClose.addEventListener("click", () => {
        signupModal.style.display = "none";
    });

    showSignupModal.addEventListener("click", (event) => {
        event.preventDefault();
        signupModal.style.display = "flex";
        userModal.style.display = "none";
    });

    showLoginModal.addEventListener("click", (event) => {
        event.preventDefault();
        userModal.style.display = "flex";
        signupModal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target == adminModal) {
            adminModal.style.display = "none";
        }
        if (event.target == userModal) {
            userModal.style.display = "none";
        }nav
        if (event.target == signupModal) {
            signupModal.style.display = "none";
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');

    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);

            if (targetInput.getAttribute('type') === 'password') {
                targetInput.setAttribute('type', 'text');
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            } else {
                targetInput.setAttribute('type', 'password');
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.navbar a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });


});



