<?php
session_start();
//connect to db 
$conn = mysqli_connect("localhost", "root", "", "reaya");

//check session if true continue else transfare to login

if (!isset($_SESSION['user_id'])) {
    header('location:user_login.php');
}
// print_r($_SESSION['user_id']);
?>
<style>
<?php include 'css/pharmacie.css';
?>
</style>
<?php

require_once('componant/CreateDb.php');
require_once('componant/component.php');


// $userId=$_GET['userId'];
// print_r($userId);
// session_start();

// print_r($_SESSION['user_id']);

//get doctor name from ussers table 
// $select= mysqli_query($conn, "SELECT `name` FROM users where id =$docId");
// $docname = mysqli_fetch_assoc($select);
// $docnn=($docname['name']);



// create instance of Createdb class
$database = new CreateDb("reaya", "users");
if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        // print_r($_SESSION['cart']);
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>Doctors</title>
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
                        <a class="nav-link p-lg-2  c-white" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="pharmacies.php">PHARMACEIES</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white active" href="doctors.php">DOCTORS</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="contact.php">CONTACT</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link  p-lg-2 c-white" href="join us.php">JOIN</a>
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
    <!-- end header -->

    <!--start head lines-->
    <div>
        <div class="cartnav" id="cardnav">
            <!-- <header class="line" style="display: flex;">
                <p class="title">
                    All medicines are dispensed from pharmacies licensed by the Ministry of Health in the Arab Republic
                    of Egypt
                </p>



                <div class="card-close">
                    <button type="button" class="closebtn">×</button>

                    <div class="carttt">
                        <div class="navbar-nav ">

                        </div>
                    </div>
                </div>
            </header> -->



            <div class="listitems mb-5">

                <div class="searchcontainer ">
                    <form action="search.php" method="post" class=" d-flex py-0">
                        <input type="text" name="search" class="form-control mb-4" placeholder="Enter any details">
                        <!-- <button type="submit" name="submit" class="btn btn-primary mb-4">Search</button> -->
                        <button type="submit" name="submit" class="button">Search</button>
                    </form>

                    <div>

                        <form action="filter.php" method="post" action="">
                            <div class="form-inline mb-5">
                                <!-- <label>Specialization</label> -->

                                <?php $select = mysqli_query($conn,"SELECT specialization FROM users where role='doctor'");
                ?>
                                <select class="form-control" name="Specialization">
                                    <!-- <option value="Specialization">Specialization</option> -->
                                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                    <option value="<?= $row['specialization']?>"><?= $row['specialization']?></option>
                                    <?php }?>
                                </select>

                                <?php $select = mysqli_query($conn,"SELECT address FROM users where role='doctor'");
                ?>
                                <select class="form-control" name="address">
                                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                    <option value="<?= $row['address']?>"><?= $row['address']?></option>
                                    <?php }?>
                                </select>
                                <button type="submit" name="filter" class="button_fel">Filter</button>
                            </div>
                        </form>


                    </div>
                </div>

                <!-------------------------lables container div------------------------->
            </div>
        </div>
        <!--******************************************************* -->
        <!--Fileter-->


        <!--Fileter-->

        <div class="container">

            <div class="row text-center py-5 carddoc">

                <style>
                .carddoc {

                    margin-top: 40px;
                    min-width: 400px
                }
                </style>

                <?php
                $result = $database->getDoctorsData();
                
                while ($row = mysqli_fetch_assoc($result)){

                    doctorsCard($row['name'],$row['price'],$row['specialization'],$row['docDesc'],$row['address'],$row ['image'],$row['id']);
                  
                }


            ?>
            </div>
        </div>

        <!--Hany-->
        <!-- start section two of information about booking in our website -->
        <section class="section2">
            <div class="container">
                <div class="sec2">
                    <div class="child2">
                        <div class="aboutone">
                            <i class="fa-solid fa-calendar-check"></i>
                            <h4>Book now</h4>
                            <p>Once you book, you will be contacted quickly and directly</p>
                            <p>Hurry up and book now</p>
                        </div>
                        <div class="aboutone">
                            <i class="fa-solid fa-file-waveform"></i>
                            <h4>Continuous follow-up of the patient</h4>
                            <p>With us, we all reach a healthy and decent life</p>
                            <p>Make sure and follow us continuously</p>
                        </div>
                        <div class="abouttwo">
                            <i class="fa-solid fa-hands-holding-circle"></i>
                            <h4>All the care you need</h4>
                            <p>
                                We have a home visit, a quick check-up, and an operation
                                reservation
                            </p>
                            <p>Premium services</p>
                        </div>
                        <div class="abouttwo">
                            <i class="fa-solid fa-building-shield"></i>
                            <h4>Book now and pay later or at the clinic</h4>
                            <p>Our booking price is the same as booking in the clinic</p>
                            <p>Safer, faster and time saving</p>
                        </div>
                    </div>
                </div>
            </div>
                
        </section>
        <!--Hany-->




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
                            <a href="doctors.php" class="text-reset active">DOCTORS</a>
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

<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</html>