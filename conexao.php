<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "lanchonetedojoao";

$connect = mysqli_connect($servername,$username,$password,$db_name);

if (mysqli_connect_error()) {
	echo "Falha na Conexao";
}
?> 