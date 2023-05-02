<style>
<?php include 'css/joinUsForm.css';
?>
</style>

<?php
$error_fields = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!(isset($_POST['name']) && !empty($_POST['name']))) {
    $error_fields[] = "name";
  }

  if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
    $error_fields[] = "email";
  }

  if (!(isset($_POST['password']) && strlen($_POST['password']) > 7)) {
    $error_fields[] = 'password';
  }

  if (!(isset($_POST['phone']) && strlen($_POST['phone']) > 10)) {
    $error_fields[] = 'phone';
  }

  if (!(isset($_POST['address']))) {
    $error_fields[] = 'address';
  }

  if (!$error_fields) {
    // Connect to DB
    $conn = mysqli_connect("localhost", "root", "", "reaya");
    if (!$conn) {
      echo mysqli_connect_error();
      exit;
    }

    // Escape any special characters to avoid SQL injection
    $name = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = ($_POST['password']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $address = mysqli_escape_string($conn, $_POST['address']);
    $role = $_POST['role'];

    // Insert the data
    $query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `role`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $address . "', '" . $role . "')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Successfully Saved!')</script>";
            //   exit;
    } else {
      // echo $query
      echo mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pharmacies Form</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/joinUsForm.css" />
    <!-- دي لينكات google fonts بتاع الخطوط -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- start nav -->
    <nav class="navbar navbar-expand-lg navbar-light nav sticky-top p-0 mb-5">
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
                        <a class="nav-link p-lg-2 c-white" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="pharmacies.php">PHARMACEIES</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="doctors.php">DOCTORS</a>
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

    <div class="input_container mb-5">
        <h1 class="title details">Registration</h1>
        <form method="post" name="formValidation" id="formValidation">
            <div class="user-details">
                <div class="input-row">
                    <div class="details">Pharmacy’Owner</div>
                    <input type="text" name="name" placeholder=" Enter Pharmacy’Owner*" />
                    <div class="error"> <?php if (in_array("name", $error_fields)) echo "Please, enter your name"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Email</div>
                    <input type="email" name="email" placeholder="Enter a valid Email*" />
                    <div class="error">
                        <?php if (in_array("email", $error_fields)) echo "Please, enter a valid email"; ?></div>
                </div>
                <div class="input-row">
                    <div class="details">password</div>
                    <input type="password" name="password" placeholder="Enter Your password*" />
                    <div class="error">
                        <?php if (in_array("password", $error_fields)) echo "Please, enter a password not less than 8 characters"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">phone</div>
                    <input type="number" name="phone" placeholder="Enter Your phone*" />
                    <div class="error">
                        <?php if (in_array("phone", $error_fields)) echo "Please, enter a phone number not less than 11 characters"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Address</div>
                    <input type="text" name="address" placeholder="Enter Your address*" />
                </div>
                <div class="input-row">
                    <div class="details">Role</div>
                    <input type="text" name="role" value="pharmacie" readonly />
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="button mt-2">Register</button>
            </div>
        </form>
    </div>

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
                        <a href="index.php" class="text-reset">HOME</a>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" type="text/javascript"></script> -->
    <!-- <script src="./assets/js/index.js" type="text/javascript"></script> -->
</body>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</html>