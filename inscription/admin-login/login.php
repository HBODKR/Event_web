<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
$mysql_host="localhost";
$mysql_bd="Elspace";
$mysql_user="root";
$mysql_pass="";
    
$bd=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_bd)or die("erreur connexion serveur");
    

    $nom=addslashes($_POST['admin']);
    $pass=md5(addslashes($_POST['pass']));
    
    $nom=mysqli_real_escape_string($bd,$nom);
    $pass=mysqli_real_escape_string($bd,$pass);
    
$sql="select id_admin from table_admin where nom='$nom' and mot_pass='$pass'";
    
$rs=mysqli_query($bd,$sql);
$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);    
$nb=mysqli_num_rows($rs);
    
    if($nb==1) {
        $_SESSION['login_user']=$nom;
        header("location:home.php"); //redirect au page home 
    }
}
?> 

<html>
      <head>
       <meta name="viewport" content="width=device-widht,initial-escale=1.0">
       <meta http-equiv="Content-type" content="text\html; charset=UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="css/login.css">
          <title>Login</title>
          <link rel="shortcut icon" type="image/x-icon" href="../img/12509407_1748794675332912_1773166938390476537_n.ico" />
     </head>
     
      <body style="background-image:url('img.jpg');background-repeat: no-repeat;background-size: cover;background-attachment: fixed;" >
          
          <div class="jumbotron boxlogin " ><!-- contenu de box login -->
               
              <form class="container" method="post" id="flogin" action="">
               <label for="admin">Nom :</label>
               <input type="text" name="admin" id="admin" class="form-control">
               <label for="pass">Mot de pass :</label>
               <input type="password" name="pass" id="pass" class="form-control">
               <input type="submit" name="submit" class="btn btn-warning" value="login">
              </form>
          </div>
      
      </body>
     
     
</html>