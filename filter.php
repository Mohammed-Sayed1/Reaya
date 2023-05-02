<?php

//connect ot the database
require 'componant/conn.php';
require_once('componant/CreateDb.php');
require_once('componant/component.php');
//get the search keyword
//$search = $_POST['search'];
//SQL query to get the products based on the search keyword

if (isset($_POST['filter'])) {
    $address = $_POST['address'];
    $Specialization = $_POST['Specialization'];
    $sql = "SELECT * FROM `users` WHERE (`address`='$address' and role='doctor')or ('specialization'='$Specialization' and role='doctor')";
    //execute the query
    $query = mysqli_query($con, $sql);
    //count the rows
    $count = mysqli_num_rows($query);
    //check whether the product is available
   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>Doctors Filter</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/pharmacie.css">
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
                        <a class="nav-link p-1 active c-white" aria-current="page" href="index.php">HOME</a>
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
                        <a class="nav-link p-1 c-white" href="user_profile.php">USER PROFILE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <!-- end header -->

    <!--start head lines-->
    <div>
        <div class="cartnav" id="cardnav">

            <?php $search = $_POST['address']; ?>
            <div style="margin:30px auto; text-align:center ;margin-bottom: -40px;">
                <h3>This page content is based on :
                    <?php echo $search; ?>
                </h3>
                <?php
 if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query)) {

        doctorsCard($row['name'], $row['price'], $row['specialization'], $row['docDesc'], $row['address'], $row['image'], $row['id']);
    }
} else {
    echo "<div class='alert alert-danger'>
there is no product matching your search....
</div>";
}
            ?>
            </div>

            <div class="container">
                <div class="row text-center py-5">


                </div>
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

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>
<!-- end footer -->

</html>