<?php

$conn = mysqli_connect("localhost","root","","phpblog");

if(mysqli_connect_errno()){
    echo "connection not successful".mysqli_connect_errno();
}else{
    //echo "connection successful";
}
?>