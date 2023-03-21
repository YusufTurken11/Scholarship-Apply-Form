<?php
if (isset($_SESSION['user'])){
    session_destroy();
    header("Location:index.php");
}else{
    header("Location:index.php?page=2");
    exit();
}