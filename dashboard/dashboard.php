<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "", "reaya");

if (!$conn) {
    echo mysqli_connect_error();
    exit;
}

//get admin name from db and print 
session_start();
if (!isset($_SESSION['id'])) {
    header('location:dashboard_login.php');
}
$adminId = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM users where role='admin' AND id='$adminId'");
$fetch = mysqli_fetch_array($query);

$adminName = "<h5 class='text-success text-white mb-3

   '>" . $fetch['name'] . "</h5>";
//get admin name from db and print 

//get admin name from db and print 

if (!isset($_SESSION['id'])) {
    header('location:dashboard_login.php');
}
$adminId = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM users where role='admin' AND id='$adminId'");
$fetch = mysqli_fetch_array($query);

$adminName = "<h5 class='text-success text-white mb-3

   '>" . $fetch['name'] . "</h5>";
//get admin name from db and print 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome css file -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Our css file -->
    <link rel="stylesheet" href="../css/new.css?" />
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet" />
</head>
<?php
if (!isset($_SESSION['id'])) {
    header('location:../dashboard_login.php');
}
?>

<body>
    <div class="page d-flex">
        <div id="side" class="sidebar">
            <!-- logo -->
            <div class="logo text-center text-white">
                <a class="logo__icon d-block text-light fw-bold" href="dashboard.php"><i
                        class="fa-solid fa-hand-holding-medical"></i>
                    Re<span>ع</span>aya</a>
                <a class="img__link d-block" href="#"><img class="img-fluid" src="../images/admin.png"
                        alt="Admin" /></a>
                <h5 class="mt-2 mb-2 fw-semibold">Admin<h5><?php echo $adminName ?></h5>
                </h5>
                <!-- <h6 class="mb-3">Admin</h6> -->
            </div>
            <ul>
                <li>
                    <a class="active d-flex align-items-center" href="dashboard.php">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-items-center" href="doctors.php">
                        <i class="fa-solid fa-stethoscope"></i>
                        <span>Doctor</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-items-center" href="products.php">
                        <i class="fa-solid fa-prescription-bottle-medical"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="pharmacie_users.php">
                        <i class="fa-solid fa-prescription-bottle-medical"></i>
                        <span>Pharmacies Users</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="patient.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Patient</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="appointment.php">
                        <i class="fa-regular fa-square-check"></i>
                        <span>Appointment</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="order.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="admin.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="../logout.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <!-- start head -->
            <div class="head">
                <div onclick="hide()" class="menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="icon d-flex align-items-center">
                    <img src="../images/admin.png" alt="" />
                </div>
            </div>
            <!-- end head -->
            <!-- Start Cards -->
            <div class="card-grand">
                <div class="card-parent">

                    <div class="card_body">
                        <div class="text">
                            <h3 class="">Doctor</h3>
                            <h3 class="">
                                <?php
                                $numOfDoctors = "SELECT * FROM `users` WHERE `role` = 'doctor'";

                                if ($doctorResult = mysqli_query($conn, $numOfDoctors)) {
                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($doctorResult);
                                    printf($rowcount);
                                    // Free result set
                                    mysqli_free_result($doctorResult);
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="icons">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                    </div>



                    <div class="card_body">
                        <div class="text">
                            <h3 class="">Patient</h3>
                            <h3 class="">
                                <?php
                                $numOfUsers = "SELECT * FROM `users` WHERE `role` = 'user'";

                                if ($usersResult = mysqli_query($conn, $numOfUsers)) {
                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($usersResult);
                                    printf($rowcount);
                                    // Free result set
                                    mysqli_free_result($usersResult);
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="icons">
                            <i class="fa fa-wheelchair ms-icon-mr"></i>
                        </div>
                    </div>



                    <div class="card_body">
                        <div class="text">
                            <h3 class="">Pharmacies</h3>
                            <h3 class="">
                                <?php
                                $numOfPharmacies = "SELECT * FROM `users` WHERE `role` = 'pharmacie'";

                                if ($pharmacyResult = mysqli_query($conn, $numOfPharmacies)) {
                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($pharmacyResult);
                                    printf($rowcount);
                                    // Free result set
                                    mysqli_free_result($pharmacyResult);
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="icons">
                            <i class="fas fa-briefcase-medical ms-icon-mr"></i>
                        </div>
                    </div>



                    <div class="card_body">
                        <div class="text">
                            <h3 class="">Admin</h3>
                            <h3 class="">
                                <?php
                                $numOfAdmins = "SELECT * FROM `users` WHERE `role` = 'admin'";

                                if ($adminResult = mysqli_query($conn, $numOfAdmins)) {
                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows($adminResult);
                                    printf($rowcount);
                                    // Free result set
                                    mysqli_free_result($adminResult);
                                }
                                ?>
                            </h3>
                        </div>
                        <div class="icons">
                            <i class="fas fa-briefcase-medical ms-icon-mr"></i>
                        </div>

                    </div>
                </div>
            </div>
            <!-- start patient table -->
            <!-- <div class="patient bg-white">
        <div class="table-header">
          <h2>PATIENT LIST</h2>
        </div>
        <div class="responsive-table">
          <table>
            <thead>
              <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Gender</td>
              </tr>
            </thead>
            <tbody>
              <?php
                // Loop on the rowset
                while ($userRow = mysqli_fetch_assoc($userResult)) {
                ?>
                <tr>
                  <td><?= $userRow['name'] ?></td>
                  <td><?= $userRow['email'] ?></td>
                  <td><?= $userRow['phone'] ?></td>
                  <td><?= $userRow['address'] ?></td>
                  <td><?= $userRow['gender'] ?></td>
                </tr>
              <?php
                }
                ?>
            </tbody>
          </table>
        </div>
      </div> -->
            <!-- end patient table -->
            <!-- start doctor table -->
            <!-- <div class="patient bg-white">
        <div class="table-header">
          <h2>DOCTORS LIST</h2>
          <a href="#" id="add-button">Add doctor</a>
        </div>
        <div class="responsive-table">
          <table>
            <thead>
              <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Specialization</td>
                <td>Price</td>
              </tr>
            </thead>
            <tbody>
              <?php
                // Loop on the rowset
                while ($doctorRow = mysqli_fetch_assoc($doctorResult)) {
                ?>
                <tr>
                  <td><?= $doctorRow['name'] ?></td>
                  <td><?= $doctorRow['email'] ?></td>
                  <td><?= $doctorRow['phone'] ?></td>
                  <td><?= $doctorRow['address'] ?></td>
                  <td><?= $doctorRow['specialization'] ?></td>
                  <td><?= $doctorRow['price'] ?></td>
                </tr>
              <?php
                }
                ?>
            </tbody>
          </table>
        </div>
      </div> -->
            <!-- end doctor table -->
        </div>
    </div>
</body>
<!-- Bootstrap js file -->
<!-- <script src="./js/bootstrap.bundle.min.js"></script> -->
<!-- Font Awesome js file -->
<!-- <script src="./js/all.min.js"></script> -->
<!-- Our js file -->
<!-- <script src="./js/main.js"></script> -->

</html>

<?php
mysqli_close($conn);
?>