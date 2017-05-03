<?php 

	// This is in the PHP file and sends a Javascript alert to the client
	$message = "Sukses My Bro!";
	echo "<script type='text/javascript'>alert('$message')</script>";
	if ($message) {
		echo "<script>window.location.href = 'http://localhost/codeigniter_alpha/index.php/pegawai'</script>";
	}

 ?>