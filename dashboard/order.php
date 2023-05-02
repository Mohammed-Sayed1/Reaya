<?php
@include '../componant/config.php';
$conn = mysqli_connect('localhost', 'root', '', 'reaya');

@include '../componant/config.php';
session_start();

//get admin name from db and print 
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
    <title>Orders</title>
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
                <a class="logo__icon d-block text-light fw-bold" href="dashboard.php"><i
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
                    <a class="active d-flex align-items-center" href="order.php">
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
                    <form method="post" action="" id="addForm">
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateName" placeholder="Name" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateEmail" placeholder="Email" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validatePhone" placeholder="Phone" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateAge" placeholder="Age" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateAddress" placeholder="Address" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" id="validateDisease" placeholder="Disease" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3 mt-4">
                            <input type="submit" class="form-control btn btn-outline-primary" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- end form -->


            <?php
$quiry=("SELECT* from orders JOIN products on orders.product_Id=products.product_id JOIN users on products.user_id=users.id");
$select = mysqli_query($conn,$quiry);

?>
            <!-- start patient table -->
            <div class="patient bg-white">
                <!-- <div class="table-header">
                    <h2>ORDERS LIST</h2>
                    <a href="#" id="add-button">Add order</a>
                </div> -->
                <div class="responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <td>Client Name</td>
                                <td>Client Address</td>
                                <td>Client Phone</td>
                                <td>Client Email</td>
                                <td>Status</td>
                                <td>Pharmacie Name</td>
                                <td>Price</td>


                                <!-- <td>Action</td> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($select)) { 
                                
                                
                                
                             
                                
                                
                                ?>
                            <tr>
                                <td>
                                    <?php echo $row['client_name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['client_address']; ?>
                                </td>

                                <td>
                                    <?php echo $row['client_phone']; ?>
                                </td>
                                <td>
                                    <?php echo $row['client_email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['order_status']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['product_price']; ?>
                                </td>
                                <!-- <td>
                                    <?php  //echo $row['product_id'];?>
                                </td> -->

                                <?php 
                          

                        //   $productId=$row['product_id'];

                        // //   Print_r($productId);
                        // $total=0;
                        //   foreach ($row as $id){
                        //     if ($row['product_id'] == $id){
                             
                        //         $total = $total + (int)$row['product_price'];
                        //         echo $total;
                        //     }
                            
                        // }
                       
                                    ; ?>




                                <!-- <td>
                                    <a href="appointment.php?delete=<?php // echo $row['order_id']; ?>" class="btn">
                                        <i class="fas fa-trash"></i>
                                        delete </a>

                                </td> -->
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