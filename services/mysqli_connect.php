<?php
//--------Server-----------//
// DEFINE ('DB_USER', 'tienwgpsql');
// DEFINE ('DB_PASSWORD', 't%210K0Ada3');
// DEFINE ('DB_HOST', '216.198.213.85');
// DEFINE ('DB_NAME', 'wgpdb');

//--------Local-----------//
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'wpay');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL '.mysqli_connect_error());

?>