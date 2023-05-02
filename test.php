<?php
	require_once 'conn.php';
	session_start();



	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
 
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
 
		if($row > 0){
			$_SESSION['user_id']=$fetch['user_id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='home.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='index.php'</script>";
		}
 
	}
 
?>


<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['user_id'])){
		header('location:index.php');
	}
?>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">PHP - Display Username After Login</h3>
        <hr style="border-top:1px dotted #ccc;" />
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>WELCOME:</h1>
            <?php
				require'conn.php';
 
 
				$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id`='$_SESSION[user_id]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
 
				echo "<h2 class='text-success'>".$fetch['username']."</h2>";
			?>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>

</html>















<?php
require_once ('componant/config.php');
session_start();


	if(ISSET($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

 
		$query = mysqli_query($conn, "SELECT * FROM `doctors` WHERE `doctor_email` = '$email' AND `doctor_pass` = '$password'") ;
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
 
		if($row > 0){
			$_SESSION['doctors_id']=$fetch['doctors_id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='pharmacie_profile.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='login.php'</script>";
		}
 
	}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome css file -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Our css file -->
    <link rel="stylesheet" href="CSS/newframework.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <!-- Google Fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="login-page d-flex justify-content-center align-items-center">
        <div class="form text-center">
            <h1 class="text-white">login</h1>
            <form method="post" action="">
                <div class="input-feild">
                    <i class="fa-solid fa-user"></i>
                    <input type="email" name="email" id="email" placeholder="User email" />
                </div>
                <div class="input-feild">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>
                <input type="submit" value="Login" />
                <!-- <center><button name="login" class="btn btn-primary">Login</button></center> -->

            </form>
        </div>
    </div>
</body>
<!-- Bootstrap js file -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome js file -->
<script src="js/all.min.js"></script>
<!-- Our js file -->
<script src="js/main.js"></script>

</html>






<!-- 




/*****************login
************** */
require_once('componant/config.php');

$select = mysqli_query($conn, "SELECT * FROM doctors WHERE `doctors_id`=''");
while ($row = mysqli_fetch_assoc($select)) {
echo "<h2 class='text-success'>". $row['doctor_name'];

    };
    /******************************* */
    ?> -->






<?php
if (!isset($_SESSION['doctors_id'])) {
    header('location:login.php');
}
?>




<?php
@include 'componant/config.php';
	if(ISSET($_POST['filter'])){
		$address=$_POST['address'];
		
		$query=mysqli_query($conn, "SELECT * FROM `users` WHERE `address`='$address' and role='doctor'") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['address']."</td></tr>";
		}
	}else if(ISSET($_POST['reset'])){
		$query=mysqli_query($conn, "SELECT * FROM `users`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['address']."</td></tr>";
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `users`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['name']."</td><td>".$fetch['address']."</td></tr>";
		}
	}
?>





<h3 class="">
    <?php
                $adminName = "SELECT * FROM `users` WHERE `role` = 'admin'";

                if ($doctorResult = mysqli_query($conn, $adminName)) {
                  // Return the number of rows in result set
                  $rowcount = mysqli_num_rows($doctorResult);
                  printf($rowcount);
                  // Free result set
                  mysqli_free_result($doctorResult);
                }
                ?>
</h3>


<h3>

    <?php

	session_start();
	if (!isset($_SESSION['id'])) {
		header('location:login.php');
	}
	$adminId=$_SESSION['id'];
	   $select = mysqli_query($conn, "SELECT * FROM users where role='admin' AND id='$adminId'");
	   $fetch = mysqli_fetch_array($query);

	   $adminName= "<h2 class='text-success'>" . $fetch['name'] . "</h2>";
	
	?>



</h3>



<div><button class="btn btn-primary buy" name="orderbuy href="
        booking.php?addbooking=<?php $_SESSION['cart'] ?>">Complete the order</button>






    <div><button class="btn btn-primary buy" name="orderbuy">Complete the order</button>
    </div>
    <style>
    .buy {
        margin: 40px;
    }
    </style>