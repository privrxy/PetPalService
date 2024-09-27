<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>PetPals Pet Sitting Service</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="love.png" id="loveimg" alt="Pawfect Care Logo" width="70">
        </div>
        <h1>Pawfect Care</h1>
        <nav class="navbar">
            <ul>
                <li class="dropdown">
                    <a href="#" id="editProfileLink">Profile</a>
                </li>
                <li><a href="#" id="appointmentLink">Appointment</a></li>
                <li><a href="#" id="historyLink">Appointment History</a></li>
                <div>
                    <button id="logoutBtn" onclick="backToHome()">Logout</button>
                </div>
            </ul>
        </nav>
    </header>
    <main>
        
        <div id="appointmentModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeAppointmentModal">&times;</span>
                <h2>Request Pet Sitting Appointment</h2>
                <form id="appointmentForm" action="appointment.php" method="POST">
                    <div class="form-section">
                        <h3>Owner's Information</h3>
                        <div class="input-group">
                            <label for="ownerName">Full Name</label>
                            <input type="text" id="ownerName" name="ownerName" required>
                        </div>
                        <div class="input-group">
                            <input type="email" id="ownerEmail" name="ownerEmail" value="<?php echo $_GET['id']?>" hidden>
                        </div>
                        <div class="input-group">
                            <label for="ownerContactNum">Contact Number</label>
                            <input type="number" id="ownerContactNum" name="ownerContactNum" required>
                        </div>
                    </div>
                    <div class="form-section">
                        <h3>Pet's Information</h3>
                        <div class="input-group">
                            <label for="petName">Pet Name</label>
                            <input type="text" id="petName" name="petName" required>
                        </div>
                        <div class="input-group">
                            <label for="petType">Pet Type</label>
                            <input type="text" id="petType" name="petType" required>
                        </div>
                        <div class="input-group">
                            <label for="appointmentDate">Date</label>
                            <input type="date" id="appointmentDate" name="appointmentDate" required>
                        </div>
                    </div>
                    <button type="submit">Submit Request</button>
                </form>
            </div>
        </div>

        <div id="historyModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeHistoryModal">&times;</span>
                <h2>Appointment History</h2>
                <table border="1">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Pet Name</th>
                        <th>Pet Type</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $get2 = $_GET['id'];

                        $conn = mysqli_connect('localhost','root','','petpal');
                        if ($conn->connect_error) {
                            die("Connection Failed!: " .$conn->connect_error);
                        }
                        $sql = "SELECT * FROM appointment WHERE email = '$get2'";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["owners_name"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["contact"] . "</td>
                                        <td>" . $row["pet_name"] . "</td>
                                        <td>" . $row["pet_type"] . "</td>
                                        <td>" . $row["date"] . "</td>
                                        <td>" . $row["status"] . "</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>0 results</td></tr>";
                        }
                        $conn->close();
                    ?>
                </table>
            </div>
        </div>

        <div id="editProfileModal" class="modal" >
            <form action="update_user.php" id="view">
                <div id="profileView">
                    <span class="close" id="closeEditProfileModal">&times;</span>
                    <h2>Profile Info</h2>
                    <table border="1">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name</th>
                            <th>E-mail</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $get = $_GET['id'];
                            $conn = mysqli_connect('localhost','root','','petpal');
                            if ($conn->connect_error) {
                                die("Connection Failed!: " .$conn->connect_error);
                            }
                            $sql = "SELECT * FROM users WHERE email = '$get'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . $row["firstName"] . "</td>
                                            <td>" . $row["lastName"] . "</td>
                                            <td>" . $row["middleName"] . "</td>
                                            <td>" . $row["email"] . "</td>
                                            <td>" . $row["contactNum"] . "</td>
                                            <td>" . $row["addRess"] . "</td>
                                            <td><button type='button' class='editBtn' data-id='" . $row["id"] . "'>Edit</button></td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>0 results</td></tr>";
                            }
                            $conn->close();
                        ?>
                    </table>
                </div>
            </form>
            <div class="modal-content">
            <form id="editProfileForm" style="display: none;" action="update_user.php" method="POST">
            <span class="close" id="closeEditInfoModal">&times;</span>
                <input type="hidden" id="editId" name="id" value="">
                <br>
                <div class="input-group">
                    <label for="editFirstName">First Name</label>
                    <input type="text" id="editFirstName" name="editFirstName" required>
                </div>
                <div class="input-group">
                    <label for="editLastName">Last Name</label>
                    <input type="text" id="editLastName" name="editLastName" required>
                </div>
                <div class="input-group">
                    <label for="editMiddleName">Middle Name</label>
                    <input type="text" id="editMiddleName" name="editMiddleName">
                </div>
                <div class="input-group">
                    <label for="editEmail">Email</label>
                    <input type="email" id="editEmail" name="editEmail" required>
                </div>
                <!-- <div class="input-group">
                    <label for="editPassword">Password</label>
                    <input type="password" id="editPassword" name="editPassword" required>
                </div> -->
                <div class="input-group">
                    <label for="editContactNum">Contact Number</label>
                    <input type="number" id="editContactNum" name="editContactNum" required>
                </div>
                <button type="submit">Save Changes</button>
            </form>

            </div>
        </div>
    </main>
    <footer>
        <p>&copy; PetPals Pet Sitting Service</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentDateInput = document.getElementById('appointmentDate');
            const today = new Date().toISOString().split('T')[0];
            appointmentDateInput.setAttribute('min', today);
        });
    </script>
    <script src="user.js"></script>
</body>
</html>
