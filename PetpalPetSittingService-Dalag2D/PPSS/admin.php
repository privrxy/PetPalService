<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Admin Panel</title>
    <script>
        function toggleSection(sectionId) {
            var sections = document.getElementsByTagName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            var selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }
        }

        window.onload = function() {
            var sections = document.getElementsByTagName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
        }

        function searchBookings() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookingTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>PPSS Administration Panel</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="toggleSection('registeredUsers')">Users</a></li>
                <li><a href="#" onclick="toggleSection('bookings')">Bookings</a></li>
                <li><a href="#" onclick="toggleSection('dashboard')">Dashboard</a></li>
                <li><a href="#" onclick="logoutsiya()" id="logoutBtn">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="registeredUsers">
            <h2>Registered Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = mysqli_connect('localhost','root','','petpal');
                        if ($conn->connect_error) {
                            die("Connection Failed!: " . $conn->connect_error);
                        }
                        $sql = "SELECT id, firstName, lastName, middleName, email, password, contactNum, addRess FROM users";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["firstName"] . "</td>
                                    <td>" . $row["lastName"] . "</td>
                                    <td>" . $row["middleName"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["password"] . "</td>
                                    <td>" . $row["contactNum"] . "</td>
                                    <td>" . $row["addRess"] . "</td>
                                    <td><button class='delete-btn' onclick='deleteData(" . $row["id"] . ")'>Delete</button></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>0 results</td></tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>

            <script>
                function deleteData(id) {
                    if (confirm("Are you sure you want to delete this data?")) {
                        
                        window.location.href = 'delete.php?id=' + id;
                    }
                }
            </script>
        </section>

        <section id="bookings">
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search bookings...">
                <button onclick="searchBookings()">Search</button>
            </div>

            <h2>Bookings</h2>

            <table id="bookingTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Pet Name</th>
                        <th>Pet Type</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="bookingTableBody">
                    <?php
                        $conn = mysqli_connect('localhost','root','','petpal');
                        if ($conn->connect_error) {
                            die("Connection Failed!: " . $conn->connect_error);
                        }
                        $sql = "SELECT id, owners_name, email, contact, pet_name, pet_type, date, status FROM appointment";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["owners_name"] .
                                    "</td><td>" . $row["email"] .
                                    "</td><td>" . $row["contact"] .
                                    "</td><td>" . $row["pet_name"] .
                                    "</td><td>" . $row["pet_type"] .
                                    "</td><td>" . $row["date"] .
                                    "</td><td>" . $row["status"] .
                                    "</td><td class='actions'><a class='confirm' href='update_status.php?id=" . $row["id"] . "&status=Confirmed'>Confirm</a> | <a class='cancel' href='update_status.php?id=" . $row["id"] . "&status=Cancelled'>Cancel</a></td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>0 results</td></tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
        
        <section id="dashboard">
            <h2>Appointments Dashboard</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','petpal');
                if ($conn->connect_error) {
                    die("Connection Failed!: " . $conn->connect_error);
                }

                $sql = "SELECT COUNT(*) AS requested FROM appointment WHERE status = 'Requested'";
                $result = $conn->query($sql);
                $requestedCount = $result->fetch_assoc()['requested'];

                $sql = "SELECT COUNT(*) AS confirmed FROM appointment WHERE status = 'Confirmed'";
                $result = $conn->query($sql);
                $confirmedCount = $result->fetch_assoc()['confirmed'];

                $sql = "SELECT COUNT(*) AS cancelled FROM appointment WHERE status = 'Cancelled'";
                $result = $conn->query($sql);
                $cancelledCount = $result->fetch_assoc()['cancelled'];

                $conn->close();
            ?>
            <div class="dashboard-container">
                <div class="dashboard-box">
                    <i class="fas fa-clock"></i>
                    <h3>Requested Appointments</h3>
                    <p><?php echo $requestedCount; ?></p>
                </div>
                <div class="dashboard-box">
                    <i class="fas fa-check"></i>
                    <h3>Confirmed Appointments</h3>
                    <p><?php echo $confirmedCount; ?></p>
                </div>
                <div class="dashboard-box">
                    <i class="fas fa-times"></i>
                    <h3>Cancelled Appointments</h3>
                    <p><?php echo $cancelledCount; ?></p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; Petpals Pet Sitting Service</p>
    </footer>
    <script src="admin.js"></script>
</body>
</html>
