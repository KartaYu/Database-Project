<?php
if ($_SESSION["permission"] !=2) {
	header("Location:login.php");
}
?>