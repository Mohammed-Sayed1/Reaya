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

  if (!(isset($_POST['specialization']))) {
    $error_fields[] = 'specialization';
  }
  // if (!(isset($_POST['image']))) {
  //   $error_fields[] = 'image';
  // }

  if (!(isset($_POST['price']))) {
    $error_fields[] = 'price';
  }

  if (!(isset($_POST['gender']))) {
    $error_fields[] = 'gender';
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
    $specialization = mysqli_escape_string($conn, $_POST['specialization']);
    $price = mysqli_escape_string($conn, $_POST['price']);
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    // $image = $_POST['image'];
//doctor image 
$doctor_image = $_FILES['doctor_img']['name'];
$doctor_image_tmp_name = $_FILES['doctor_img']['tmp_name'];
$doctor_image_folder = 'upload/' . $doctor_image;
    //doctor image 
    // Insert the data
    $query = "INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `role`, `gender`, `specialization`,  `price`, `docDesc`, `image`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $address . "', '" . $role . "', '" . $gender . "', '" . $specialization . "', '" . $price . "', '" . $description . "', '$doctor_image')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Successfully Saved!')</script>";
               exit();
             
    } else {
      // echo $query
      echo mysqli_error($conn);
    }

    
    $upload = mysqli_query($conn, $query);

    
        if ($upload) {
            move_uploaded_file($doctor_image_tmp_name, $doctor_image_folder);
            $message[] = 'New doctor added successfully';
        } else {
            $message[] = 'Could not add the doctor';
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
    <title>Doctor Form</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/joinUsForm.css??" />
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
        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" name="formValidation"
            id="formValidation">
            <div class="user-details">




                <div class="input-row">
                    <div class="details">Image</div>
                    <input type="file" class="box" name="doctor_img" accept="image/png, image/jpeg, image/jpg">
                </div>




                <div class="input-row">
                    <div class="details">Full Name</div>

                    <input type="text" name="name" placeholder="Enter Full Name*" />
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
                    <input type="password" name="password" placeholder="Enter passwordnot less than 8 characters*" />
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
                    <div class="details">specialization</div>
                    <input type="text" name="specialization" placeholder="Enter Your specialization*" />
                    <div class="error">
                        <?php if (in_array("specialization", $error_fields)) echo "Please, enter your specialization"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Description</div>
                    <input type="text" name="description" placeholder="Enter Your Description*" />
                    <div class="error">
                        <?php if (in_array("description", $error_fields)) echo "Please, enter your description"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">price</div>
                    <input type="text" name="price" placeholder="Enter price*" />
                    <div class="error"> <?php if (in_array("price", $error_fields)) echo "Please, enter your price"; ?>
                    </div>
                </div>
                <div class="input-row">
                    <div class="details">Role</div>
                    <input type="text" name="role" value="doctor" readonly />
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="male" class="non" />
                <input type="radio" name="gender" id="dot-2" value="female" class="non" />
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">female</span>
                    </label>
                </div>
                <div class="error"> <?php if (in_array("gender", $error_fields)) echo "Please, choose your gender"; ?>
                </div>
            </div>
            <div class="text-center">
                <!-- <button type="submit">
                Register
            </button> -->
                <button type="submit" name="submit" class="button">Register</button>
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
    <script src="js/index.js" type="text/javascript"></script>
</body>

</html>