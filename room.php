<?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');


    ?>
    <header>

<div id="menu-bar" class="fas fa-bars"></div>

<a href="#" class="logo">Hotel Booking System</a>

<nav class="navbar">
    <a href="index.php">home</a>
    <a href="book.php">book</a>
    <a href="room.php">rooms</a>
    <a href="pay.php">payment</a>
    <a href="login.php">login</a>
</nav>


</header>

    <section class="packages" id="packages">

    <h1 class="heading">
        <span>r</span>
        <span>o</span>
        <span>o</span>
        <span>m</span>
        <span>s</span>
    </h1>

	<div class="container">	
                	<?php 
                	include'admin/db_connect.php';
                	$qry = $conn->query("SELECT * FROM  room_categories order by rand() ");
                	while($row = $qry->fetch_assoc()):
                	?>
                    <div class="card item-rooms mb-3">
							<div class="card-body">
								<div class="row">
								<div class="col-md-5">
                                    <img src="assets/img/<?php echo $row['cover_img'] ?>" alt="" />
							</div>
								<div class="col-md-5" height="100%">
									<h3><b><?php echo 'RM '.number_format($row['price'],2) ?></b><span> / per day</span></h3>

									<h4><b>
										<?php echo $row['name'] ?>
									</b></h4>
									
								</div>
                                </div>
								
                                </div>
                                
                            </div>
                	<?php endwhile; ?>
                    

    </div>
	</section>
    <style type="text/css">
	.item-rooms img {
    width: 23vw;
}
</style>