<!DOCTYPE html>
<html lang="en">
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
    <a href="room.php">rooms</a>
    <a href="pay.html">payment</a>
    <a href="admin/login.php">admin</a>
    <a href="recep/login.php">receptionist</a>
</nav>


</header>

       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>

        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
