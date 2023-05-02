<?php

$conn = mysqli_connect('localhost', 'root','', 'reaya');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>Pharmacie Search</title>
    <!--fontawesome -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/pharmacie.css?">
    <!-- دي لينكات google fonts بتاع الخطوط -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

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

            <?php $search = $_POST['search']; ?>
            <div style="margin:30px auto; text-align:center ;margin-bottom: -40px;">
                <h3>This page content is based on:
                    <?php echo $search; ?>
                </h3>
            </div>
            <div class="container">
                <div class="row text-center py-5">

                    <?php

                    //connect ot the database
                    require 'componant/conn.php';
                    require_once('componant/CreateDb.php');
                    require_once('componant/component.php');
                    //get the search keyword
                    //$search = $_POST['search'];
                    //SQL query to get the products based on the search keyword
        //             $sql = "SELECT * FROM products WHERE product_name LIKE 
        // '%$search%' OR product_price LIKE '%$search%' OR product_description LIKE '%$search%'";


$sql = "SELECT * FROM products WHERE product_name LIKE 
'%$search%'
 OR product_price LIKE '%$search%'
  OR product_description LIKE '%$search%'";

                     //execute the query
                        
                     $query = mysqli_query($conn, $sql);



                     //count the rows
                     $count = mysqli_num_rows($query);
                     //check whether the product is available
                     if ($count > 0) {
                         while ($row = mysqli_fetch_assoc($query)) {

                           
                           
            component($row['product_name'], $row['product_price'],$row['product_description'], $row ['product_image'], $row['product_id']);
            ?>

                    <?php

                        }
                    } else {
                        echo "<div class='alert alert-danger'>
            there is no product matching your search....
            </div>";
                    }

                    ?>
                </div>


            </div>





            < <!-- start footer -->
                <footer class="section_end text-center text-lg-start pt-2" style="  bottom: 0;
    margin-top: 100px;">
                    <!-- Section: Links  -->
                    <div class="container p-3">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->

                            <!-- Copyright -->

                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">
                                <!-- Content -->
                                <div class="pb-2">
                                    <img src="./assets/images/logoFooter.PNG" alt="" />
                                    <span>Re<h>ع</h>aya</span>
                                </div>
                                <p></p>
                                <div class="pt-3">
                                    <a class="text-reset" href="">©2020 Thousand Sunny. All rights reserved</a>
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
                                    <a href="#!" class="text-reset">HOME</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">PHARMACEIES</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">DOCTORS</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">JOIN US</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">CONTACT US</a>
                                </p>
                            </div>
                            <!-- End Grid column -->

                            <!-- Start Grid column -->
                            <div class="col-md-2 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">ABOUT</h6>
                                <p><i class="fa-solid fa-phone"></i> +1800-001-658</p>
                                <p>
                                    <i class="fa-solid fa-envelope"></i> Info@Peacefulthemes.Com
                                </p>
                                <p>
                                    <i class="fa-solid fa-location-dot"></i> Themeforest, Envato HQ
                                    24 Fifthst., Los Angeles, USA
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