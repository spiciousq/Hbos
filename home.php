<?php
    include('admin/db_connect.php');

	$qry = $conn->query("SELECT * FROM room_categories");
	
    ?>
    
    <section class="home" id="home">

    <div class="content">
        <h3>hotel booking system</h3>
    </div>

<div class = "book">
<form action="index.php?page=list" class="book-form" id="filter" method="POST">
        <div class = "form-item"> 
            <label for = "checkin-date">Check In Date: </label>
            <input type = "date" id = "chekin-date" name="date_in" >
        </div>
        <div class = "form-item">
            <label for = "checkout-date">Check Out Date: </label>
            <input type = "date" id = "chekout-date" name="date_out" >
        </div>
        
        <div class = "form-item">
            <label for = "room">Room: </label>
            <select id="room" name="name">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($row= $qry->fetch_assoc()):; 
            ?>
                <option value="<?php echo $row["id"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $row["name"];

                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
            </select>


            
        </div>
        <div class = "form-item">
            <input type = "submit" class = "btn" value = "Check Room Availability">
        </div>
    </form>
</div>
</section>

