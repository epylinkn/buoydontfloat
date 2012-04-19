<?php #script mysqli_connect.php

//This file contains the database access information.
//This file establishes the connection to MySQL db.

//Database access information as constants
DEFINE ('DB_USER','dbo263155230');
DEFINE ('DB_PASSWORD','SfAJEm9j');
DEFINE ('DB_HOST','db1714.perfora.net');
DEFINE ('DB_NAME', 'db263155230');

//Make the connection
$dbc = @mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
?>