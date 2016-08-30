<?php
// Etablissement de la connexion avec le serveur en passant servername, ID utilisateur et mot de passe comme paramètre
$connection = mysqli_connect("localhost", "root", "","Elspace");

session_start();

$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query( $connection,"select nom from table_admin where nom='$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session =$row['nom'];
if(!isset($_SESSION['login_user'])){
header('Location: login.php'); 
}
?>