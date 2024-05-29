<?php 
include('admin/db_connect.php');
$rid = '';

$date_in = $_GET['date_in'];
$date_out = $_GET['date_out'];
$calc_days = $_GET['days'];
$cid =  $_GET['cid'];
$qry = $conn->query("SELECT * FROM room_categories where id = '$cid'");
while($row = $qry->fetch_assoc()):

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBOS</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo">Hotel Booking System</a>

    <nav class="navbar">
    <a href="index.php">home</a>
    <a href="room.php">rooms</a>
    <a href="payment.php">payment</a>
    <a href="admin/login.php">admin</a>
    <a href="recep/login.php">receptionist</a>
</nav>

</header>

<!-- header section ends -->



<!-- book section starts  -->

<section class="book" id="book">

    <h1 class="heading">
        <span>payment form</span>
    </h1>

    <div class="row">
    <form action="invoice.php" method="get">
    <input type="hidden" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid']: '' ?>">
		<input type="hidden" name="rid" value="<?php echo isset($_GET['rid']) ? $_GET['rid']: '' ?>">
        
		<div class="inputBox">
            <h3>total payment : <?php $total = isset($meta['total']) ? $meta['total']: 'RM'.number_format($row['price'] * $calc_days ,2); echo $total;?></h3>
            <input type="hidden" name="total" id="total" class="form-control" value="<?php echo isset($meta['total']) ? $meta['total']: 'RM'.number_format($row['price'] * $calc_days ,2) ?>" required>
        </div>	
        <input type="hidden" name="name" value=" <?php echo $name?> " />
        <input type="hidden" name="days" value=" <?php echo $calc_days?> " />
        <input type="hidden" name="date_in" value=" <?php echo $date_in?> " />
        <input type="hidden" name="date_out" value=" <?php echo $date_out?> " />
        

		<div class="inputBox">
            <h3>payment date : <?php echo isset($_GET['payDate']) ? date((date_default_timezone_set("Asia/Kuala_Lumpur")($_GET['payDate']))): date("d-m-Y") ?></h3>
           
        </div>
		<div class="inputBox">
            <h3>payment time : <?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date('H:i:sa');?></h3>
        </div>
		<div class="inputBox">
            <h3>payment method : </h3>
            <select class="custom-select browser-default" name="method">
                <option value="0">Cash</option>
                <option value="1">Online Banking</option>
                <option value="2">Debit/Credit Card</option>
            </select>
    </div>
    <button class="btn book_now"  type="submit" value="submit" >Confirm Payment</button>
	</form>
    <?php endwhile; ?>
</div>
</section>




<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>