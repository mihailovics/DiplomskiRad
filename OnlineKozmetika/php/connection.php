<?php 
    $con = new mysqli("localhost","root","","kozmetika");
    if($con->connect_error){
        echo "Doslo je do greske". $con->connect_error;
    }
    


?>