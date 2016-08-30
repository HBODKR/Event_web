<?php
$host ="localhost";  
$user ="root";
$bdd = "Elspace";
$password  ="";

mysqli_set_charset('utf8');

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$np=$nom." ".$prenom;
$post=$_POST['post'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$int=$_POST['int'];
$chk="";


foreach( $int as $chk1 )
{
  $chk .=$chk1.",";  
}

$spec=$_POST['spec'];

$c=mysqli_connect($host, $user,$password) or die("erreur de connexion au serveur");
mysqli_select_db($c,$bdd) or die("erreur de connexion a la base de donnees");



$test="INSERT INTO particpant (Nom_pre,Email,Tel,Poste,Specialite,Interesse) 
VALUES('$np','$email',$tel,'$post','$spec','$chk')"; //requette d'insertion

$rq=mysqli_query($c,$test);
header('Location:merci.html'); // redirect au page merci

?>
