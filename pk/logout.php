<?php 
	session_start();
	unset($_SESSION['customer']);
	// session_destroy();
?>

<script>
	window.location="index.php";
</script>