<?php
session_start();
ob_start();

include "settings/db.php";
include "settings/pages.php";

if (isset($_REQUEST['page'])){
    $RequestedPageNumber = $_REQUEST['page'];
}else{
    $RequestedPageNumber = "";
}

if ($RequestedPageNumber == 0 or $RequestedPageNumber == "" or $RequestedPageNumber > 3 or $RequestedPageNumber < 0){//Must be changed after page number changes
    include "main.php";
}else {
    include "$page[$RequestedPageNumber]";
}