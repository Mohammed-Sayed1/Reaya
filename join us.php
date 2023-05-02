<?php
// We will use it for storing the signed in user data
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Connect to DB
  $conn = mysqli_connect("localhost", "root", "", "reaya");
  if (!$conn) {
    echo mysqli_connect_error();
    exit;
  }
  // Escape any special characters to avoid SQL injection
  $email = mysqli_escape_string($conn, $_POST['email']);
  $password = ($_POST['password']);
  // Select *note: i deleted this part of query => "' and `password` = '" . $password . 
  $query = "SELECT * FROM `users` WHERE `email` = '" . $email . "' LIMIT 1";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    header("Location: index.php");
    exit;
  } else {
    $error = "Invalid email or password";
  }
  // Close the connection
  mysqli_free_result($result);
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style_joinus.css??" />
    <!-- <link rel="stylesheet" href="assets/css/joinUsForm.css" /> -->
    <!-- دي لينكات google fonts بتاع الخطوط -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
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
                        <a class="nav-link p-lg-2  c-white" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="pharmacies.php">PHARMACEIES</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white " href="doctors.php">DOCTORS</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white active" href="join us.php">JOIN</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-lg-2 c-white" href="doctor_profile.php">DOCTORS PROFILE</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="pharmacie_profile.php">PHARMACEIES PROFILE</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-1 p-lg-3 c-white" href="user_profile.php">USER PROFILE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->
    <section class="join" id="join">
        <div class="container">
            <div class="p-3">
                <h1 class="pb-1">J<span>o</span>in us</h1>
                <p class="">Join us to achieve a better life for you and your family</p>
            </div>
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 mt-5">
                <div class="col mb-sm-3 mb-md-3">
                    <div class="card h-100 p-2 text-center">
                        <div class="card-body">
                            <h2 class="card-title">D<span class="">o</span>ctor</h2>
                            <i class="fa-solid fa-user-doctor"></i>
                            <p class="card-text pt-2 text-black-50">
                                If you are a doctor try joining from here,make sure fill all information about you and
                                don't forject to follw us in our social media other pages,thanks to join us.
                            </p>
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Join us
                                </button>
                                <ul class="dropdown-menu  border-primary ">
                                    <li><a class="dropdown-item text-black-50" href="DoctorForm.php"
                                            target="_blank">create new account</a></li>

                                    <a href="doctor_login.php">
                                        <button type="button>" class="dropdown-item text-black-50"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">I already have an
                                            account</button></a>
                                </ul>

                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content modal-color">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">login in</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php // if (isset($error)) echo $error; ?>
                                                <form method="post">
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="recipient-email "
                                                                class="col-form-label">Email:</label>
                                                        </div>

                                                        <input type="email" name="email" class="form-control"
                                                            id="recipient-email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="message-password"
                                                                class="col-form-label ">Password:</label>
                                                        </div>
                                                        <input type="password" name="password" class="form-control"
                                                            id="message-password"></input>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="reset" value="close" data-bs-dismiss="modal"
                                                            class="btn btn-outline-primary p-2 text-light">
                                                        <input type="submit" value="login"
                                                            class="btn btn-primary p-2 text-light">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-sm-3 mb-md-3">
                    <div class="card h-100 p-2 text-center">
                        <div class="card-body">
                            <h2 class="card-title">P<span class="">h</span>armacy</h2>
                            <i class="fa-solid fa-staff-snake"></i>
                            <p class="card-text pt-2 text-black-50">
                                If you are a pharmacy try joining from here,make sure fill all information about you and
                                don't forject to follw us in our social media other pages,thanks to join us..
                            </p>
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Join us
                                </button>
                                <ul class="dropdown-menu border-primary">
                                    <li><a class="dropdown-item text-black-50 " href="PharmacyForm.php"
                                            target="_blank">create new account</a></li>
                                    <a href="pharmacie_login.php">
                                        <button type="button>" class="dropdown-item text-black-50"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">I already have an
                                            account</button>
                                    </a>
                                </ul>
                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content modal-color">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">login in</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <?php // if (isset($error)) echo $error; ?>
                                                <form>
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="recipient-email"
                                                                class="col-form-label">Email:</label>
                                                        </div>
                                                        <input type="email" class="form-control" id="recipient-email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="message-password"
                                                                class="col-form-label">Password:</label>
                                                        </div>
                                                        <input type="password" class="form-control"
                                                            id="message-password"></input>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="reset" value="close" data-bs-dismiss="modal"
                                                            class="btn btn-outline-primary p-2 text-light">
                                                        <input type="submit" value="login"
                                                            class="btn btn-primary p-2 text-light">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-sm-3 mb-md-3">
                    <div class="card h-100 p-2 text-center">
                        <div class="card-body">
                            <h2 class="card-title">U<span class="">s</span>er</h2>
                            <i class="fa-solid fa-user"></i>
                            <p class="card-text pt-2 text-black-50">
                                If you are a new user try joining from here,make sure fill all information about you and
                                don't forject to follw us in our social media other pages,thanks to join us.
                            </p>
                            <div class="dropdown">
                                <button class="btn  dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Join us
                                </button>
                                <ul class="dropdown-menu border-primary">
                                    <li><a class="dropdown-item text-black-50 " href="userForm.php"
                                            target="_blank">create new account</a></li>
                                    <a href="user_login.php"><button type="button>" class="dropdown-item text-black-50"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">I already have an
                                            account</button></a>
                                </ul>
                                <!-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content modal-color">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">login in</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php //if (isset($error)) echo $error; ?>
                                                <form>
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="recipient-email"
                                                                class="col-form-label ">Email:</label>
                                                        </div>
                                                        <input type="email" class="form-control " id="recipient-email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="start">
                                                            <label for="message-password"
                                                                class="col-form-label">Password:</label>
                                                        </div>
                                                        <input type="password" class="form-control"
                                                            id="message-password">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="reset" value="close" data-bs-dismiss="modal"
                                                            class="btn btn-outline-primary p-2 text-light">
                                                        <input type="submit" value="login"
                                                            class="btn btn-primary p-2 text-light">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        <a href="index.php" class="text-reset ">HOME</a>
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
                        <a href="join us.php" class="text-reset active">JOIN US</a>
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
</body>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/index.js"></script> -->

</html>