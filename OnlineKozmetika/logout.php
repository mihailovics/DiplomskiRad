<?php
    setcookie("sesija", "", time() - 3600, "/");
    header("Location:index.php");
?>