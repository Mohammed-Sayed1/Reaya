<?php
session_start();
//check session if true continue else transfare to login
if (!isset($_SESSION['user_id'])) {
    header('location:user_login.php');
}
///////////////// Display registed users in table //////////////////////////////////////
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "", "reaya");
$userId=$_SESSION['user_id'];
// print_r($userId);

if (!$conn) {
echo mysqli_connect_error();
exit;
}
// Doctor's Data
$displayQuery = "SELECT * FROM `users` WHERE `email` = '" . $_SESSION['email'] . "' and `role` = 'User' LIMIT 1";
$result = mysqli_query($conn, $displayQuery);

// Appointnets Data
$tableQuery = "SELECT * FROM `appointment` WHERE user_id = " . $_SESSION['user_id'];
$tableResult = mysqli_query($conn, $tableQuery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- <link rel="stylesheet" href="css/user_profile.css" /> -->
    <!-- دي لينكات google fonts بتاع الخطوط -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <title>User Profile</title>

    <style>
    <?php include 'css/user_profile.css';
    ?>
    </style>

</head>


<body>
    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-light nav sticky-top p-0">
        <div class="container">
            <div class="col-3 logo d-flex ">
                <div class="images">
                    <img src="images/logo1.PNG" alt="" />
                </div>
                <div class="loader ">
                    <span>Reعaya</span>
                    <span>Reعaya</span>
                </div>
            </div>
            <button class="navbar-toggler navbar-toggler-right " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-8 justify-content-end" id="navbarTogglerDemo02">
                <ul class="navbar-nav  mb-2 mb-lg-0 ">
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-1  c-white" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-1 c-white" href="pharmacies.php">PHARMACEIES</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-1 c-white" href="doctors.php">DOCTORS</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-1 c-white" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-1 c-white" href="join us.php">JOIN</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-1 c-white" href="doctor_profile.php">DOCTORS PROFILE</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-1 c-white" href="pharmacie_profile.php">PHARMACEIES PROFILE</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-1 active c-white" href="user_profile.php">USER PROFILE</a>
                    </li>
                    <li>
                        <button type="submit" value="send" name="submit" class="button_nav"><a
                                href="logout.php">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->
    <!-- start section one -->
    <?php
  // Loop on the rowset
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="parent">
        <div class="Doctor_profile">
            <div>
                <h3>Welcome !</h3>
            </div>

            <h3><?= $row['name'] ?></h3>
        </div>
    </div>
    <!-- end section one -->
    <!-- start section two -->
    <div class="description_doctor_profile">
        <div class="Age">
            <div class="icon">
                <i class="fa-solid fa-cake-candles"></i>
            </div>
            <div class="title_age col-9">
                <h3>Number of appointments</h3>
                <p><?php
              $numOfAppointments = "SELECT * FROM appointment WHERE user_id  = " . $_SESSION['user_id'];

              if ($appointResult = mysqli_query($conn, $numOfAppointments)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows($appointResult);
                printf($rowcount);
                // Free result set
                mysqli_free_result($appointResult);
              }
              ?></p>
            </div>
        </div>
        <div class="Phone">
            <div class="icon">
                <i class="fa-solid fa-mobile"></i>
            </div>
            <div class="title_phone col-9">
                <h3>Phone Number</h3>
                <p><?= $row['phone'] ?></p>
            </div>
        </div>
        <div class="Address">
            <div class="icon">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="title_address col-9">
                <h3>Address</h3>
                <p><?= $row['address'] ?></p>
            </div>
        </div>
    </div>
    <?php
  }
  ?>
    <!-- end section two -->

    <?php
      $select = mysqli_query($conn, "SELECT * FROM appointment where user_id=$userId");


    ?>
    <!-- start section three -->

    <div class="table-doctor-profile">
        <div class="container">
            <div class="row">
                <div class="table table-bordered table-color">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Dr Name</th>
                                <!-- <th scope="col">Department</th> -->
                                <th scope="col">Date Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              // Loop on the rowset


             while ($row = mysqli_fetch_assoc($select)){



            //   while ($tableRow = mysqli_fetch_assoc($tableResult)) {
              ?>
                            <tr>
                                <td><?= $row['doctor_name'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td><?= $row['status'] ?></td>
                            </tr>
                            <?php
              }
              ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- end section three -->

    <!-- start footer -->
    <footer class="section_end text-center text-lg-start pt-2">
        <!-- Section: Links  -->
        <div class="container p-3">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->

                <!-- Copyright -->

                <div class="col-md-5 col-lg-4 col-xl-3 mx-auto mb-2">
                    <!-- Content -->
                    <div class="col logo d-flex">
                        <div class="image">
                            <img src="images/logo1.PNG" alt="" />
                            <!-- <span>Re<h>ع</h>aya</span> -->
                        </div>
                        <div class="loader_footer">
                            <span>Reعaya</span>
                            <span>Reعaya</span>
                        </div>
                    </div>

                    <div class="pt-3">
                        <a class="text-reset" href="">©2023 Reعaya. All rights reserved</a>
                    </div>
                </div>
                <!-- Copyright -->

                <!-- Start Grid column -->

                <!-- End Grid column -->

                <!-- Start Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">OUR PAGE</h6>
                    <p>
                        <a href="index.php" class="text-reset active">HOME</a>
                    </p>
                    <p>
                        <a href="pharmacies.php" class="text-reset">PHARMACEIES</a>
                    </p>
                    <p>
                        <a href="doctors.php" class="text-reset">DOCTORS</a>
                    </p>
                    <p>
                        <a href="/contact.php" class="text-reset">CONTACT US</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset">JOIN US</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset">DOCTOR PROFILE</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset">PHARMACEIES PROFILE</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset">USER PROFILE</a>
                    </p>
                </div>
                <!-- End Grid column -->

                <!-- Start Grid column -->
                <div class="col-md-2 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">ABOUT</h6>
                    <p><i class="fa-solid fa-phone"></i> +201128980604</p>
                    <p><i class="fa-solid fa-envelope"></i> abdo@gmail.Com</p>
                    <p>
                        <i class="fa-solid fa-location-dot"></i> Aswan , Egypt
                    </p>
                </div>

                <!-- End Grid column -->
                <!-- Grid row -->
            </div>
            <!-- Section: Links  -->

            <!-- Icons -->
            <div class="text-center pl-4">
                <div class="container" style="border-top: 1px solid white">
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>

                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg text-dark mt-2" href="#!" role="button"
                        data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>
                </div>
            </div>
            <!-- Icons -->
        </div>
    </footer>
    <!-- end footer -->

    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>