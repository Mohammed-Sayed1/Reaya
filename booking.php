<?php
session_start();
$userId=$_SESSION['user_id'];
// print_r($userId);
// get id of doctor from appointment. 
$docId=$id=$_GET['addbooking'];
// start connection.
$conn = mysqli_connect('localhost', 'root','', 'reaya');//get doctor name from ussers table 
$select= mysqli_query($conn, "SELECT `name` FROM users where id =$docId");
$docname = mysqli_fetch_assoc($select);
$docnn=($docname['name']);



if (isset($_POST['adding'])) {
  //get data from user
  $doctor_name =$docnn;
  $patient_name = $_POST['name'];
  $patient_phone = $_POST['phone'];
  $patient_date=$_POST['patient_date'];

  //validation 
  if (empty(($patient_phone)||($patient_date))) {
    $message[]=('please fill out all');
  } else {
      $insert = "INSERT INTO appointment(patientName,patient_phone,doctor_name,status,doctorId,date,user_id)
       VALUES ('$patient_name','$patient_phone','$docnn','inprocess','$docId','$patient_date','$userId')";
      $upload = mysqli_query($conn,$insert);
      
      if ($upload) {
        $message[] = 'New Booking added successfully';
    } else {
        $message[] = 'Could not add the Booking';
    }
  }
};
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" />
    <title>Booking</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- دي لينكات google fonts بتاع الخطوط -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

</head>
<style>
/* Start Nav */

.loader {
    position: relative;
    width: 185px;
}

.loader span {
    position: absolute;
    color: #fff;
    transform: translate(-50%, -50%);
    font-size: 38px;
    letter-spacing: 5px;
    top: 50%;
    left: 50%;
}

.loader span:nth-child(1) {
    color: transparent;
    -webkit-text-stroke: 0.3px white;
}

.loader span:nth-child(2) {
    color: white;
    animation: uiverse723 3s ease-in-out infinite;
}

@keyframes uiverse723 {

    0%,
    100% {
        clip-path: polygon(0% 45%, 15% 44%, 32% 50%, 54% 60%, 70% 61%, 84% 59%, 100% 52%, 100% 100%, 0% 100%);
    }

    50% {
        clip-path: polygon(0% 60%, 16% 65%, 34% 66%, 51% 62%, 67% 50%, 84% 45%, 100% 46%, 100% 100%, 0% 100%);
    }
}

.contanier {
    width: 80%;
    margin: 0px auto;
}

.navbar-nav .nav-item .nav-link {
    padding: 6px !important;
}

a {
    text-decoration: none;
}

.c-white {
    color: white !important;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.active {
    color: black !important;
}

.navbar {
    /* height: 75px; */
    display: flex;
    justify-content: space-between;
    /* box-shadow: 5px 0px 5px 5px #f4f6f9; */
    background-color: #61acce;
}

.images img {
    width: 70px;
}

.image img {
    width: 70px;
}


/* end Nav */
/* Start Form */
.section-two {
    background-image: url(../images/images.png), url(../images/images.png);
    background-repeat: no-repeat;
    background-size: 50px;
    background-position: 18% 4%, 79% 73%;
}

.container .form {
    background-image: url(../images/photo_2023-02-27_20-30-52.jpg);
    height: 400px;
    object-fit: cover;
    vertical-align: middle;
    background-size: cover;
    background-position: 0% 20%;
    background-repeat: no-repeat;
    /* display: none; */
}


.form {
    width: 40%;
    margin: 0px auto;
    background-color: #f4f6f9;
    padding: 15px;
    box-shadow: 2px 1px 6px 0px #2490eb;

}

.form_butt {
    background-color: #009efb;

}

.message {
    display: block;
    background: var(--bg-color);
    padding: 1.5rem 1rem;
    font-size: 2rem;
    color: var(--black);
    margin-bottom: 2rem;
    text-align: center;
}

/* End Form */

/* Srart footer */

.section_end {
    color: white;
    background-color: #61acce;
}

.section_end img {
    width: 120px;
}

.section_end svg {
    font-size: 20px;
    color: white;
    padding: 0;
}

.section_end span {
    color: white;
    font-size: 1.5em;
}

.section_end span h {
    color: #18100f;
    font-size: 1.5em;
}

.loader_footer {
    position: relative;
    left: 85px;
    top: -5px;
}

.loader_footer span {
    position: absolute;
    color: #fff;
    transform: translate(-50%, -50%);
    font-size: 38px;
    letter-spacing: 5px;
    top: 50%;
    left: 50%;
}

.loader_footer span:nth-child(1) {
    color: transparent;
    -webkit-text-stroke: 0.3px white;
}

.loader_footer span:nth-child(2) {
    color: white;
    animation: uiverse723 3s ease-in-out infinite;
}

@keyframes uiverse723 {

    0%,
    100% {
        clip-path: polygon(0% 45%, 15% 44%, 32% 50%, 54% 60%, 70% 61%, 84% 59%, 100% 52%, 100% 100%, 0% 100%);
    }

    50% {
        clip-path: polygon(0% 60%, 16% 65%, 34% 66%, 51% 62%, 67% 50%, 84% 45%, 100% 46%, 100% 100%, 0% 100%);
    }
}

.icons-footer i {
    font-size: 20px;
    margin-right: 15px;
}

/* End footer */

/* butt filter */

.button {
    --color: #61acce;
    background-color: transparent;
    border-radius: .3em;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: .5s;
    font-weight: 400;
    font-size: 17px;
    height: 38px;
    width: 180px;
    border: 1px solid;
    font-family: inherit;
    text-transform: uppercase;
    color: #61acce;
    z-index: 1;
}

.button a {
    color: #61acce;
}

.button:hover a {
    color: white;
}

.button::before,
.button::after {
    content: '';
    display: block;
    width: 50px;
    height: 50px;
    transform: translate(-50%, -50%);
    position: absolute;
    border-radius: 50%;
    z-index: -1;
    background-color: #61acce;
    transition: 1s ease;
}

.button::before {
    top: -1em;
    left: -1em;
}

.button::after {
    left: calc(100% + 1em);
    top: calc(100% + 1em);
}

.button:hover::before,
.button:hover::after {
    height: 410px;
    width: 410px;
}

.button:hover {
    color: white;
}

.button:active {
    filter: brightness(.8);
}
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
                    <input type="text" class="form-control mb-4" name="name" placeholder="Enter Your Name"
                        aria-label="product-name" />
                    <input type="number" class="form-control mb-4" name="phone" placeholder="Enter Your Phone"
                        aria-label="Server" />
                    <input type="text" class="form-control mb-4" name="bookdate" placeholder="Enter Your Description"
                        aria-label="Server" />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Enter Your Booking Date</label>
                    <input name="patient_date" class="form-control" type="datetime-local" />
                </div>
                <!-- here i add a doctor id which it is hidden -->
                <div>
                    <input type="text" name="status" value="inprocess" hidden>


                    <!-- <input type="text" name="doctor_n" value="<?php $select = mysqli_query($conn, "SELECT * FROM users where id =$docId");
            $row = mysqli_fetch_assoc($select);
            echo $row['name']; ?>">
                    <input type="text" name="doctor_id" value="<?php echo $docId ?>">
                </div> -->
                    <div class="mb-3">
                        <!-- <button type="submit" name="adding" id="form_butt" class="btn form_butt mt-5">Submit</button> -->
                        <button type="submit" name="adding" onclick="nonedisplay()" class="button">Send</button>

                    </div>
            </form>
        </div>
    </section>
    <!-- End Form -->

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
<!-- Bootstrap js file -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome js file -->
<script src="js/all.min.js"></script>
<!-- Our js file -->

</html>