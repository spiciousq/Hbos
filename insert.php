<?php
include_once 'admin/db_connect.php';
if(isset($_POST['submit']))
{    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];
     $sql = "INSERT INTO clients (name,email,phone,address)
     VALUES ('$name','$email','$phone','$address')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>