<?php
     $conn = mysqli_connect("localhost", "root", "", "arkademy");

     if(!$conn)
     {
          die("Connection Failed: " . mysqli_connect_error());
     }
?>