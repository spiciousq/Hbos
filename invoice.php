<?php 
include('admin/db_connect.php');
$total = $_GET['total'];

$date_in = $_GET['date_in'];
$date_out = $_GET['date_out'];
$day = $_GET['days'];
$cid =  $_GET['cid'];

$cat = $conn->query ( "SELECT c.* , p.* FROM room_categories c, rooms p WHERE c.id=p.category_id and c.id = '$cid' and c.id not in (SELECT room_id from checked where '$date_in' BETWEEN date(date_in) and date(date_out) and '$date_out' BETWEEN date(date_in) and date(date_out)  )");
						while($row = $cat->fetch_assoc()):
?>
  <title>HBOS</title>
<link rel="stylesheet" href="invoice.css">
<link rel="stylesheet" href="style.css">
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <center><h2>Invoice</h2></center>
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>Booking Details</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                 
                                                    <tr>
                                                            <td>Room : <?php echo $row['room']?></td>
                                                            
                                                        </tr>
                                                     
                                                        <tr>
                                                            <td>Room Name : <?php echo $row['name']?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Day of stays : <?php echo $day?></td>
                                                         
                                                        </tr>
                                                        <tr>
                                                            <td>Check in Date : <?php echo $date_in?></td>
                                                          
                                                        </tr>
                                                        <tr>
                                                            <td>Check out Date : <?php echo $date_out?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>Total : <?php echo $total?></td>
                                                            
                                                        </tr>
                                                        <?php endwhile; ?>
                                                    </tbody></table>
                                                </td>
                                            </tr>

                                           
</tr>
                                    <td>
                                        
                                    <center>
                                        
                                    <a href="javascript:window.print()"><button class="btn" >Print</button></a>
                                    <a href="index.php"><button class="btn" >New reservation</button></a>
                                </center>
                                
                                    </td>
                                </tr>
                                                      
                                        </tbody></table>
                                    </td>
                                </tr>
                              
                                <td class="content-block">
                                       <center>  Thank you for choosing us !</center>
                                    </td>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                </div>
        </td>
        <td></td>
    </tr>
    
</tbody></table>

