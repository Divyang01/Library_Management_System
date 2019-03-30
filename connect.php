<?php
	$conn = new mysqli('localhost', 'root', '', 'libsys1') or die(mysqli_error());
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}