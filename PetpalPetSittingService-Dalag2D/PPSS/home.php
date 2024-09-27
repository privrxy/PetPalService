<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>PetPals Pet Sitting Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section id="home">
        <header>
            <div class="logo">
                <img src="love.png" id="loveimg" alt="Pawfect Care Logo" width="70">
            </div>
            <h1>Pawfect Care</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="login">Login</a>
                        <div class="dropdown-content" id="myDropdown">
                            <div id="admin">
                                <img src="admin.png" alt=""> 
                                Admin
                            </div>
                            <div id="user">
                                <img src="user.png" alt=""> 
                                User
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>   
    </section>
    <main class="main">
        <h2>Petpals Pet Sitting Service</h2>
        <h3>"PawfectCare: Your Trusted Pet Sitting Companion for Cats And Dogs!"</h3>
    </main>

    <section id="about">
        <div class="about_page">
            <div class="abt">
                <h2>
                    Introducing "PetPals Pet Sitting Service: Your Trusted Companions When You're Away"
                </h2>
                <p>
                    At <em>PetPals Pet Sitting Service</em>, we understand that leaving your beloved pets behind can be a worrisome experience. That's why we're here to provide exceptional pet care and peace of mind while you're away. Our dedicated team of professional pet sitters is committed to creating a safe, comfortable, and nurturing environment for your furry friends. 
                </p>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="services_page">
            <div class="serv">
                <h2>
                    Why Choose PetPals Pet Sitting Service?
                </h2>
                <p>
                    <em>SERVICES OFFERED:</em>
                </p>
                <p>
                    <em> In-Home Pet Sitting:</em>
                    Our experienced pet sitters will visit your home to care for your pets. We'll provide feeding, fresh water, playtime, exercise, and plenty of love and attention. We'll also administer medications if needed, ensuring your pets' well-being.
                </p>
                <p>
                    <em>Pet Playtime and Enrichment:</em>
                    We believe in keeping your pets entertained and mentally stimulated. Our sitters will engage your pets in playtime activities, interactive toys, and puzzles to keep them engaged and happy.
                </p>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contact_page">
          <div class="cont">
            <h2>
                Reach out!
            </h2>
            <p>
                At <em>PetPals Pet Sitting Service</em>, we treat your pets like family because we understand the unconditional love and joy they bring to your life. Let us be your trusted companions when you're away, ensuring that your pets receive the care and attention they deserve. Contact us today to schedule a pet sitting service tailored to your needs.  
            </p>
            <p>
              <em>+63 970 087 9105</em>
            </p>
          </div>
        </div>
    </section>

    <footer>
        <p>&copy; PetPals Pet Sitting Service</p>
    </footer>

    <div id="adminModal" class="modal">
        <div class="modal-content">
            <span class="close" id="adminClose">&times;</span>
            <h2>Admin Login</h2>
            <form id="adminLoginForm" action="adminlogin.php" method="post">
                <div class="input-group">
                    <label for="adminUsername">Username</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="adminUsername" name="username" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="adminPassword">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-eye toggle-password" data-target="adminPassword"></i>
                        <input type="password" id="adminPassword" name="password" required>
                    </div>
                </div>
                <button type="submit">Login</button>
                <!-- <div class="forgotpass">
                    <a href="#">Forgot Password?</a>
                </div> -->
            </form>
        </div>
    </div>

    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" id="userClose">&times;</span>
            <h2>User Login</h2>
            <form id="userLoginForm" action="login.php" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="userPassword">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-eye toggle-password" data-target="userPassword"></i>
                        <input type="password" id="userPassword" name="password" required>
                    </div>
                </div>
                <button type="submit">Login</button>
                <div class="signupLink">
                    <p>Not a member? <a href="#" id="showSignupModal">Sign up</a> </p>   
                </div>
            </form>
        </div>
    </div>

    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close" id="signupClose">&times;</span>
            <h2>Sign Up</h2>
            <form id="signupForm" action="connect.php" method="post">
                <div class="input-group">
                    <label for="fName">First Name</label>
                    <input type="text" id="fName" name="fName" required>
                </div>
                <div class="input-group">
                    <label for="lName">Last Name</label>
                    <input type="text" id="lName" name="lName" required>
                </div>
                <div class="input-group">
                    <label for="mName">Middle Name</label>
                    <input type="text" id="mName" name="mName">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-eye toggle-password" data-target="password"></i>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="contactNum">Contact Number</label>
                    <div class="input-icon">
                        <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAARlJREFUSEvFlWFuwjAMhf3KDlJuwm7SY6Qp0kBak94CdhK4yXqQDSMXOlVNAgldIVLVP8n7bD/HAc28MLM+OYC1UisGdkSUT4C3tbVLOe8AqrI8ENFqgnh3tLa20/YBeKr4wwAA209jNkqp/C3LCmb+CAWTnEEvPhTUWhdgFr+c5QCqsrxZml/mZdM07VBJMlkA37MBRDgU2L+UaK31JuRDMoCIWgBfP6fTXiJPNvmeB6mtm2zyACBGy3fzMqaWqGVga4zpyiNLOkj+i8tYcWDRAF//j8vlMzu2RMfa2veY+ldK7Qgo+r1RAN/lCsGuU1gGZfyw66OIyWB86aI9iBUf73spYN4H52qWzPkpr9pf9z3/0X/U1NC5M845pxnKptD2AAAAAElFTkSuQmCC"/></i>
                        <input type="number" id="contact_num" name="contact_Num" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="address">Address</label>
                    <div class="input-icon">
                    <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAS1JREFUSEu1lNGNwjAMhm0xyMEmsMmxRUqRAImSbMHdJHQTugj4FKmuUjdpHB3NW2P7/2zXDsLCBxfWBzXAGLNeId59Qi+ivXOu0ySnAgTi2160exHtNJAsQIhz1msAUEFmAVK8sXbT3z0AQAVJAmLi3PMSSBQwJ14KmQA04iWQEaBEXAsZAHIUG2uzEyYgz9gIDyK1MXdA/OYgBhyN2VK/YIj46+1EdJJjWlcVBYvXNtbu/HcWUFeVz8yPZOx0fnS9IQvgaHbkCkTgBCL9ZGsnfZaA4+Fw7lsyEUfEy/V2O4cVFAN8cBRC9NM4t09VzvfZCthxBBHi/65gBHm/v8LMP1ZB7u2X/664RZ8EzM19jjPsRbKCYHNTy5WCtEh0uTrXhg7q9yaXesq+OOAPiFUAKNOWaYwAAAAASUVORK5CYII="/></i>
                        <input type="text" id="address" name="address" required>
                    </div>
                </div>
                <button type="submit">Sign Up</button>
                <div class="loginLink">
                    <p>Already have an account? <a href="#" id="showLoginModal">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="home.js"></script>
</body>
</html>
