<?php
//connect to db
session_start();
@include 'componant/config.php';
//validation
$doc="$_SESSION[pharmacie_id]";
// print_r($doc);
if (isset($_POST['add_product'])) {
//get data from user
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];
$product_image = $_FILES['product_image']['name'];
$product_image_tmp_name = $_FILES['product_image']['tmp_name'];
$product_image_folder = 'upload/' . $product_image;
$doctors_id=$_SESSION['pharmacie_id'];
//validation



if (empty($product_name) || empty($product_price) || empty($product_image)) {
$message[] = 'please fill out all';
} else {



$insert = "INSERT INTO products (product_name, product_price,product_description,product_image,user_id)
VALUES('$product_name', '$product_price','$product_description', '$product_image','$doc')";
$upload = mysqli_query($conn, $insert);
if ($upload) {
move_uploaded_file($product_image_tmp_name, $product_image_folder);
$message[] = 'new product added successfully';
} else {
$message[] = 'could not add the product';
}
}

}
;

;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacie Profile</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/add-profile.css??" />
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
                        <a class="nav-link  p-1 active c-white" href="pharmacie_profile.php">PHARMACEIES PROFILE</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a class="nav-link p-1 c-white" href="user_profile.php">USER PROFILE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->
    <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }

   ?>
    <div class="parent_card">
        <div class="container">
            <div class="admin-product-form-container">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <h4>Add a new product</h4>
                    <input type="text" placeholder="enter product name" name="product_name" class="box">
                    <input type="number" placeholder="enter product price" name="product_price" class="box">
                    <input type="text" placeholder="enter product description" name="product_description" class="box">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
                    <div class="addbtn">
                        <!-- <input type="submit" class="btn" name="add_product" value="add product"> -->
                        <button type="submit" name="add_product" class="button_fel me-5 ms-4">Add Product</button>
                        <button type="submit" name="add_product" class="button_fel ms-5"> <a
                                href="pharmacie_profile.php">go back!</a>
                        </button>

                    </div>
                </form>
            </div>
        </div>

        <?php

      $select = mysqli_query($conn, "SELECT * FROM products");

      ?>

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
                        <a href="join us.php" class="text-reset">JOIN US</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset">DOCTOR PROFILE</a>
                    </p>
                    <p>
                        <a href="join us.php" class="text-reset active">PHARMACEIES PROFILE</a>
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

</html>