<?php
include('session.php'); 
?>

<html>
<head>
    <meta name="viewport" content="width=device-with, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/footable.bootstrap.min.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../../js/footable.min.js"  type="text/javascript"></script>
		<script type="text/javascript" src="js/exportcsv.js"></script>
    
    <script type="text/javascript">//fonction en javascript pour l'affichage du tableau en tel ou tablet
    $(document).ready(function(e)
     {
        $("#csv").click(function(e)
               { $("#table").tableExport(
                {
                  type:'csv',
                  ecape:'false',
                });
            });
    });
</script>
     
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/12509407_1748794675332912_1773166938390476537_n.ico" />
    </head>
    <body>
       
        <nav class="navbar navbar-inverse " role="navigation"><!-- menu navbar -->
            <div class="container">
                <div class="navbar-header"><!-- l'entete navbar -->
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><!-- icon navbar -->
                      <span class="sr-only"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span></button>
                      <a class="navbar-brand" href="#" style="color:white;padding: 14px 16px;">Elspace</a><!-- titre navbar -->
                </div>
                
                <div class="collapse navbar-collapse" id="menu"><!-- l'icon navbar logout -->
                  <ul class="nav navbar-nav navbar-right">
                    <li> <a class="navbar-brand" href="logout.php" style="color:white;padding: 14px 16px;"><span class="glyphicon glyphicon-off"></span></a></li>
                  </ul>
              </div>
             </div> 
            </div>
        </nav><!-- fin navbar menu -->
    
        <div  style="padding:50px;">
        <div  id="pdf">
          <h1>Participants :</h1>
             <form method="post" action="../pdf.php"> <!-- formulaire contient un tableau -->
               <div class="row" >
                 <div class="col-md-12 " id="table">
                    <table  class="table table-striped"  >
                    <thead><!-- entet du tableau -->
                     <tr>
                     <th data-breakpoints="xs" style="font-size: 90%  width: 20%;" >Date</th>
                     <th data-breakpoints="xs sm" style="font-size: 90%">Id</th>
                     <th  style="font-size: 90%">Nom et Prenom</th>
                     <th data-breakpoints="xs sm" style="font-size: 90%">Email</th>
                     <th data-breakpoints="xs sm" style="font-size: 90%">Tel</th>
                     <th data-breakpoints="xs" style="font-size: 90%">Poste</th>
                     <th data-breakpoints="xs" style="font-size: 90%">Specialte</th>
                     <th data-breakpoints="xs sm" style="font-size: 90%">Ineresser par </th>
                     </tr>
                    </thead>
               
                  <tbody> <!-- corps du tableau -->
                    <?php //remplire table avec requete sql
                    $host ="localhost";  
                    $user ="root";
                    $bd = "elspace";
                    $password  ="";
                    $c=mysqli_connect($host,$user,$password) or die("erreur connexion !!");
                    mysqli_select_db($c,$bd) or die("erreur au base de donne !!");
                    $rq=mysqli_query($c,"select * from particpant");
                    while($rq1=mysqli_fetch_assoc($rq))
                    {
                        echo ' <tr>';
                        echo '<td style="font-size:70%">'.htmlentities($rq1['Time']).'</td>';
                        echo '<td style="font-size:70%">'.htmlentities($rq1['Id']).'</td>';
                        echo '<td style="font-size:90%">'.htmlentities($rq1['Nom_pre']).'</td>';
                        echo '<td style="font-size:80%">'.htmlentities($rq1['Email']).'</td>';
                        echo '<td style="font-size:80%">'.htmlentities($rq1['Tel']).'</td>';
                        echo '<td style="font-size:80%">'.htmlentities($rq1['Poste']).'</td>';
                        echo '<td style="font-size:80%">'.htmlentities($rq1['Specialite']).'</td>';
                        echo '<td style="font-size:80%">'.htmlentities($rq1['Interesse']).'</td>';
                        echo  '</tr>';
                           
                    }
                   ?>
                 </tbody>
                </table>
                     
                     <script type="text/javascript">
			var exportTable1=new ExportHTMLTable('table');
		</script>
               
                <input type="submit" class="btn btn-danger" value="Exporter en PDF" ><!-- affiche contenu du tableau en pdf -->
                <a type="button" class="btn btn-success" id="csv" >Exporter en CSV</a><!-- affiche contenu du tableau en 
csv -->
            </div>
        </div>
               </form> 
            </div>
    </div>
            
 </body>

<script type="text/javascript">//fonction en javascript pour l'affichage du tableau en tel au tablet
	jQuery(function($){
	$('.table').footable();
});
</script>


</html>