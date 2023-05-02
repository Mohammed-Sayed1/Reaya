<?php
//connect to db 
session_start();

@include '../componant/config.php';
//validation
if (isset($_POST['add_product'])) {
   //get data from user
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_description = $_POST['product_description'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = '../upload/' . $product_image;
   //validation 
// print_r($product_name);
   if (empty($product_name) || empty($product_price) || empty($product_image)) {
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO products(product_name, product_price,product_description,product_image) VALUES('$product_name', '$product_price','$product_description', '$product_image')";
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
//delete product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    //mysql quiry 
    mysqli_query($conn, "DELETE FROM products WHERE product_id  = $id");
    // return user in same page 
    header('location:products.php');
    };
    
    
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
<!--Header file-->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products </title>
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
                    <a class=" active d-flex align-items-center" href="products.php">
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
            <div class="popup">
                <div class="form-container">
                    <div class="close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                        <h3>Add a new product</h3>

                        <div class="input-control mb-3">
                            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image"
                                class="box">
                            <!-- <div class="error"></div> -->
                        </div>

                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="product_name" name="product_name" />
                            <div class="error"></div>
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="product_price" name="product_price" />
                            <!-- <div class="error"></div> -->
                        </div>
                        <div class="input-control mb-3">
                            <input type="text" class="form-control" placeholder="product_description"
                                name="product_description" />
                            <!-- <div class="error"></div> -->
                        </div>

                        <div class="input-control mb-3 mt-4">
                            <input type="submit" class="form-control btn btn-outline-primary" id="submit"
                                name="add_product" value="add product" />
                        </div>

                    </form>
                </div>
            </div>
            <!-- end form -->
            <?php
$select = mysqli_query($conn, "SELECT * FROM products");
?>
            <!-- start patient table -->
            <div class="patient bg-white">
                <div class="table-header">
                    <h2>DOCTORS LIST</h2>
                    <a href="#" id="add-button">Add Pharmacie</a>
                </div>
                <div class="responsive-table">
                    <table>
                        <thead>
                            <tr>
                                <td>product image</td>
                                <td>product name</td>
                                <td>product price</td>
                                <td>product description</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                        <tr>
                            <td><img src="../upload/<?php echo $row['product_image']; ?>" height="100" width="100"
                                    alt="">
                            </td>
                            <td>
                                <?php echo $row['product_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['product_price']; ?>
                            </td>
                            <td>
                                <?php echo $row['product_description']; ?>
                            </td>

                            <td>
                                <a href="products_update.php?edit=<?php echo $row['product_id']; ?>" class="btn"> <i
                                        class="fas fa-edit"></i>
                                    edit </a>
                                <a href="products.php?delete=<?php echo $row['product_id']; ?>" class="btn"> <i
                                        class="fas fa-trash"></i>
                                    delete </a>
                            </td>
                        </tr>
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