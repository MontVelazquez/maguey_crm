<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
	session_destroy();
	header("Location:../index.html");
}
else
{
   header("Location:../index.html");
}

?>