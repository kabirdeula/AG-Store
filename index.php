<?php
session_start();

if($_SESSION["firstName"]){
    echo "Welcome" . $_SESSION["firstName"];
}else{
    echo "Please Login First";
}
