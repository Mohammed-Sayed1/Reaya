<?php
//sql connection
// @include 'config.php';
require_once("../componant/config.php");
// get data from 
$id = $_GET['edit'];
if (isset($_POST['update_doctor'])) {
$doctor_name = $_POST['doctor_name'];
$doctor_adress = $_POST['doctor_adress'];
$doctor_phone = $_POST['doctor_phone'];
$examination_price = $_POST['examination_price'];
$doctor_descrip = $_POST['doctor_descrip'];
$examination_price=$_POST['examination_price'];
$doctor_img = $_FILES['doctor_img']['name'];
$doctor_image_tmp_name = $_FILES['doctor_img']['tmp_name'];
$doctor_image_folder = '../upload/' . $doctor_img;

//validation
if (empty($doctor_name) || empty($examination_price)) {
    $message[] = 'please fill out all!';
 } else {
    $update_data = "UPDATE users SET name='$doctor_name', price='$examination_price', image='$doctor_img', address='$doctor_adress'  WHERE id = '$id'";
    $upload = mysqli_query($conn, $update_data);
    if ($upload) {
       move_uploaded_file($doctor_image_tmp_name, $doctor_image_folder);
       header('location:doctors.php');
    } else {
       $$message[] = 'please fill out all!';
    }
 }
}
;

//get admin name from db and print 
session_start();

if (!isset($_SESSION['id'])) {
    header('location:../dashboard_login.php');

}
$adminId=$_SESSION['id'];
   $query = mysqli_query($conn, "SELECT * FROM users where role='admin' AND id='$adminId'");
   $fetch = mysqli_fetch_array($query);

   $adminName= "<h5 class='text-success text-white mb-3

   '>" . $fetch['name'] . "</h5>";
   //get admin name from db and print 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctors Update</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Font Awesome css file -->
    <link rel="stylesheet" href="../css/all.min.css" />
    <!-- Our css file -->
    <link rel="stylesheet" href="../css/dashboard.css" />
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet" />
</head>


<body>

    <div class="page d-flex">
        <div id="side" class="sidebar">
            <!-- logo -->
            <div class="logo text-center text-white">
                <a class="logo__icon d-block text-light fw-bold" href="home.php"><i
                        class="fa-solid fa-hand-holding-medical"></i>
                    Re<span>ع</span>aya</a>
                <a class="img__link d-block" href="#"><img class="img-fluid" src="../images/admin.png"
                        alt="Admin" /></a>
                <h5 class="mt-2 mb-2 fw-semibold">Admin<h5><?php echo $adminName?></h5>
                </h5>
            </div>
            <ul>
                <li>
                    <a class=" d-flex align-items-center" href="dashboard.php">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-items-center" href="doctors.php">
                        <i class="fa-solid fa-stethoscope"></i>
                        <span>Doctor</span>
                    </a>
                </li>
                <li>
                    <a class=" d-flex align-items-center" href="products.php">
                        <i class="fa-solid fa-prescription-bottle-medical"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="pharmacie_users.php">
                        <i class="fa-solid fa-prescription-bottle-medical"></i>
                        <span>Pharmacies Users</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="patient.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Patient</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="appointment.php">
                        <i class="fa-regular fa-square-check"></i>
                        <span>Appointment</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="order.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Order</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="admin.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center" href="../logout.php">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            <?php
if (isset($message)) {
foreach ($message as $message) {
echo '<span class="message">' . $message . '</span>';
}
}
?>
            <!-- start head -->
            <div class="head">
                <div onclick="hide()" class="menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="icon d-flex align-items-center">
                    <img src="images/admin.png" alt="" />
                </div>
            </div>
            <!-- end head -->
            <!-- start form -->
            <div class="popedit" id="pop">
                <div class="form-container">

                    <?php
$select = mysqli_query($conn, "SELECT * FROM users WHERE id  = '$id'");
while ($row = mysqli_fetch_assoc($select)) {
?>
                    <form method="post" id="addForm" enctype="multipart/form-data">
                        <div class="input-control mb-3">
                            <input type="file" class="box" name="doctor_img" accept="image/png, image/jpeg, image/jpg">
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateName" name="doctor_name"
                                value="<?php echo $row['name']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateEmail" placeholder="Email"
                                name="doctor_email" value="<?php echo $row['email']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validatePhone" placeholder="Phone"
                                name="doctor_phone" value="<?php echo $row['phone']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateSpecialization"
                                placeholder="Doctor Descripition" name="doctor_descrip"
                                value="<?php echo $row['docDesc']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateSpecialization"
                                placeholder="specialization" value="<?php echo $row['specialization']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateAddress" placeholder="Address"
                                name="doctor_adress" value="<?php echo $row['address']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateAddress" placeholder="Examination price"
                                name="examination_price" value="<?php echo $row['price']; ?>" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3 mt-4">
                            <input type="submit" class="form-control btn btn-outline-primary" id="submit"
                                name="update_doctor" value="update doctor" />
                        </div>
                        <div class="input-control mb-3 mt-4">
                            <a href="doctor_admin.php"> <input type="submit!"
                                    class="form-control btn btn-outline-primary" id="submit" value="go back!" /></a>
                        </div>
                    </form>
                    <?php }
         ; ?>
                </div>
                <!------------------------------------------------------------------------------------------->

            </div>
            <!-- end form -->

            <!-- start patient table -->

            <!-- end patiente -->
        </div>
    </div>

</body>
<!-- Bootstrap js file -->
<script src="../js/dashboard/bootstrap.bundle.min.js"></script>
<!-- Font Awesome js file -->
<script src="../js/dashboard/all.min.js"></script>
<!-- Our js file -->
<script src="../js/dashboard/main.js"></script>


</html>