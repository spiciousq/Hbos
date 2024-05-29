<?php
$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('Y-m-d');
$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('Y-m-d',strtotime(date('Y-m-d').' + 3 days'));
$name = $_POST['name'];

?>


		
<section class="packages" id="packages">
<h1 class="heading">
        <span>Available Rooms</span>

    </h1>
						
	<div class="box-container">				
						<?php 
						
						$cat = $conn->query ( "SELECT c.* , p.* FROM room_categories c, rooms p WHERE c.id=p.category_id and c.id = '$name' and c.id not in (SELECT room_id from checked where '$date_in' BETWEEN date(date_in) and date(date_out) and '$date_out' BETWEEN date(date_in) and date(date_out)  )");
						while($row = $cat->fetch_assoc()):

						?>
				
						<div class="box">
                            <img src="assets/img/<?php echo $row['cover_img'] ?>" alt="">
							<div class="content">
							<h3><?php echo $row['room'] ?></h3> 
								<div class="price"> <?php echo "RM ".number_format($row['price'],2) ?> per day</div>
								<button class="btn book_now"  type="button" data-id="<?php echo $row['category_id'] ?>">Book now</button>
									
							</div>
								
							</div>
							
					
						<?php endwhile; ?>
				</div>	
		</div>	
</section>

<script>
	$('.book_now').click(function(){
		uni_modal('Book','admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid='+$(this).attr('data-id'));
	})
</script>

