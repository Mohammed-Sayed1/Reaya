<?php
//connect to db 
@include '../componant/config.php';
//validation
if (isset($_POST['add_pharmacie'])) {
    //get data from user
    $pharmacie_name = $_POST['doctor_name'];
    $pharmacie_adress = $_POST['doctor_adress'];
    $pharmacie_phone = $_POST['doctor_phone'];
    $pharmacie_email = $_POST['doctor_email'];
    $pahrmacie_password = $_POST['doctor_pass'];
    // $rule=$_POST['rule'];
    //validation 
    if (empty($pharmacie_name)||empty($pharmacie_adress)||empty($pharmacie_email)||empty($pahrmacie_password)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO users(name,address,phone,email,password,role)
       VALUES ('$pharmacie_name','$pharmacie_adress','$pharmacie_phone','$pharmacie_email','$pahrmacie_password','pharmacie')";
        $upload = mysqli_query($conn, $insert);

        if ($upload) {
            $message[] = 'New Pharmacie added successfully';
        } else {
            $message[] = 'Could not add the Pharmacie';
        }
    }
}
;
//delete patient
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    //mysql quiry 
    mysqli_query($conn, "DELETE FROM users WHERE id  = $id AND role='pharmacie'");
    // return user in same page 
    header('location:pharmacie_users.php');
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
    <title>Pharmacie</title>
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
                    <a class=" d-flex align-items-center" href="doctors.php">
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
                    <a class="active d-flex align-items-center" href="pharmacie_users.php">
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
            <!-- start head -->
            <div class="head">
                <div onclick="hide()" class="menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="icon d-flex align-items-center">
                    <img src="../images/admin.png" alt="" />
                </div>
            </div>
            <!-- end head -->

            <!-- start form -->

            <div class="popup">
                <div class="form-container">
                    <div class="close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                        <div>
                            <?php
                            if (isset($message)) {
                                foreach ($message as $message) {
                                    echo '<span class="message">' . $message . '</span>';
                                }
                            }
                            ?>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="Pharmacie Name" name="doctor_name" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="Pharmacie Phone" name="doctor_phone" />
                            <!-- <div class="error"></div> -->
                        </div>


                        <div class="input-control mb-3">
                            <input type="email" class="form-control" placeholder="Pharmacie Email"
                                name="doctor_email" />
                            <!-- <div class="error"></div> -->

                        </div>
                        <div class="input-control mb-3">
                            <input type="password" class="form-control" placeholder="Pharmacie password"
                                name="doctor_pass" />
                            <!-- <div class="error"></div> -->
                        </div>

                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="Pharmacie Adress"
                                name="doctor_adress" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3 mt-4">
                            <input type="submit" class="form-control btn btn-outline-primary" id="submit"
                                name="add_pharmacie" value="Add Pharmacie" />
                        </div>

                    </form>
                </div>
            </div>
            <!-- end form -->
            <?php

            $select = mysqli_query($conn, "SELECT * FROM users where role='pharmacie'");
            ?>
            <!-- start patient table -->
            <div class="patient bg-white">
                <div class="table-header">
                    <h2>Pharmacie Users</h2>
                    <a href="#" id="add-button">Add Pharmacie</a>
                </div>
                <div class="responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <!-- <td>id</td> -->
                                <td>Pharmacie Name</td>
                                <td>Pharmacie Phone</td>
                                <td>Pharmacie Email</td>
                                <td>Pharmacie Adress</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['phone']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>

                                <td>
                                    <?php echo $row['address']; ?>
                                </td>


                                <td>
                                    <a href="pharmacie_users.php?delete=<?php echo $row['id']; ?>" class="btn">
                                        <i class="fas fa-trash"></i>delete </a>

                                </td>
                            </tr>

                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
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