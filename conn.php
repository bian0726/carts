<?php
$mysqli = new mysqli("localhost","root","","bob_bian");
if($mysqli->connect_error !=""){
    echo "error for connect";
    exit();
} else{
    $mysqli->query("set names utf8");
}
?>