<?php
// get id of doctor from appointment. 
// $docId=$id=$_GET['addbooking'];
// start connection.

session_start();
@include 'componant/config.php';
require_once("componant/CreateDb.php");
require_once("componant/component.php");



$db = new CreateDb("reaya", "products");
$cartb = ($_SESSION['cart']);
// print_r($cartb);

$product_id = array_column($cartb, 'product_id');
$result = $db->getData();
$row = mysqli_fetch_assoc($result);


// foreach($cartb as $value)
// {
//     foreach($value as $valu )
//     {

//         $insert = "INSERT INTO orders(product_Name)
//                         VALUES ('$valu')";
//                 $upload = mysqli_query($conn, $insert);
//         // print_r ($valu);

//     }
//     // print_r($cartb);
// }

if (isset($_POST['orderdetails'])) {
    //get data from user form   
    $client_name = $_POST['client_name'];
    $client_phone = $_POST['client_phone'];
    $client_email = $_POST['client_email'];
    $client_address = $_POST['client_address'];
    //validation 
    if (empty($client_name)) {
        echo "<script>alert('please fill out all!')</script>";

    } else {
       

        
            foreach ($product_id as $id) {
            
               
            
                //comment importatnt
                // $order_id = $row['product_id'];
 $insert = "INSERT INTO orders(product_Id,client_name,client_phone,client_email,client_address,order_status)
                        VALUES ('$id','$client_name','$client_phone','$client_email','$client_address','inprocess')";
                $upload = mysqli_query($conn, $insert);
                
            }

                if ($upload) {
                    echo "<script>alert('order added successfully')</script>";

                } else {
                    echo "<script>alert('Could not add the order')</script>";

                }
            
        
    }
}
;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>Shaipment Details</title>
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
<style>
/* End Form */
</style>



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


    <!-- Start Form -->
    <!-- <div class="cartnav" id="cardnav">
        <header class="line" style="display: flex;">
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
        </header>

    </div> -->
    <div>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">' . $message . '</span>';
            }
        }
        ?>
    </div>
    <section class="section-two">
        <div class="container mt-5 mb-4">
            <form method="post" enctype="multipart/form-data" class="form" id="form">
                <div class="mb-3">
                    <input type="text" class="form-control mb-4" name="client_name" placeholder="Enter Your Name"
                        aria-label="product-name" />
                    <input type="number" class="form-control mb-4" name="client_phone" placeholder="Enter Your Phone"
                        aria-label="Server" />
                    <input type="text" class="form-control mb-4" name="client_email" placeholder="Enter Your email"
                        aria-label="Server" />
                    <input type="text" class="form-control mb-4" name="client_address" placeholder="Enter Your Adress"
                        aria-label="Server" />


                    <input type="text" class="form-control mb-4" name="client_address2"
                        placeholder="Enter Your second Adress" aria-label="Server" disabled />

                    <div class="mb-3">
                        <!-- <button type="submit" name="orderdetails" id="form_butt" onclick="nonedisplay()"class="btn form_butt mt-5">Submit</button> -->
                        <button type="submit" name="orderdetails" id="form_butt" onclick="nonedisplay()"
                            class="button">Submit</button>

                    </div>
                </div>


            </form>
        </div>
    </section>
    <!-- End Form -->
</body>
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
<!-- Bootstrap js file -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome js file -->
<script src="js/all.min.js"></script>
<!-- Our js file -->

</html>