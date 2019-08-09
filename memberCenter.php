<?php
session_start();
if(!$_SESSION['login']){
    header("Location:signin.php");
}
if(isset($_POST["logout"])){
    unset($_SESSION['login']);
    header("Location: index.php");
}
?>
<form method="post">
<input type="submit" id="logout" name="logout" value="Logout">
<a href="index.php">go to home page</a>
</form>