<?php 

	// server information
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "eshop";

	
	// create database
	$connection = new mysqli($host, $user, $pass, $db);

	// query data 
	$sql = "CREATE TABLE product_info(
		
		id int(5) AUTO_INCREMENT,
		product_name varchar(50),
		product_discription varchar(100),
		brand varchar(20),
		tag varchar(20),
		regular_price int(10),
		sell_price int(10),
		category varchar(20),
		photo varchar(100),
		PRIMARY KEY(id)

	)";
	$connection -> query($sql);


 ?>