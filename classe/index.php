<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>
<div class="general-content">
<h1>La classe</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Faites une requête dans la base de données users, vous devez remonter les informations, nom, prenom et date_naissance. La date de naissance doit être transformée pour donner l'âge de la personne. Vous devez faire une fonction pour la convertion date de naissance / âge.
    </p>
<h2>Résultat</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>

            </tr>
        </tfoot>
        <tbody>
        
      <!-- 	<tr><td>Dupoirieux</td><td>Yoann</td><td>29 ans</td></tr><tr><td>Hel</td><td>Nicolas</td><td>32 ans</td></tr><tr><td>Dassigny</td><td>Kevin</td><td>24 ans</td></tr><tr><td>Maignan</td><td>Dylan</td><td>19 ans</td></tr><tr><td>Prevot</td><td>Gwenael</td><td>24 ans</td></tr><tr><td>Toussaint</td><td>Audrey</td><td>22 ans</td></tr><tr><td>Nazimek</td><td>Alexis</td><td>24 ans</td></tr><tr><td>Mehlinger</td><td>Fabien</td><td>19 ans</td></tr><tr><td>Fetet</td><td>Kevin</td><td>25 ans</td></tr><tr><td>Bertrand</td><td>Etienne</td><td>26 ans</td></tr><tr><td>Fleurentin</td><td>Jennifer</td><td>24 ans</td></tr><tr><td>Maillard</td><td>Florant</td><td>30 ans</td></tr><tr><td>Richard</td><td>Meddy</td><td>21 ans</td></tr><tr><td>Najai</td><td>Kaouthar</td><td>24 ans</td></tr><tr><td>Perrin</td><td>Olivier</td><td>32 ans</td></tr><tr><td>Chouieb</td><td>Mehdy</td><td>19 ans</td></tr><tr><td>Creus</td><td>Virginie</td><td>29 ans</td></tr><tr><td>Filali</td><td>Dalia</td><td>22 ans</td></tr><tr><td>Bouroub</td><td>Djamel</td><td>26 ans</td></tr><tr><td>Remeter</td><td>Charlie</td><td>24 ans</td></tr><tr><td>Mouraret</td><td>Steve</td><td>22 ans</td></tr><tr><td>Chudant</td><td>Chloé</td><td>24 ans</td></tr><tr><td>Marchal</td><td>Thibault</td><td>23 ans</td></tr> -->
	<?php
	foreach ($dbconnexion->query('SELECT nom, prenom, date_naissance from users') as $Apprenant) {
	   echo '<tr><td>'.$Apprenant['nom'].'</td><td>'.$Apprenant['prenom'].'</td><td>'.calculAge($Apprenant['date_naissance']).'</td></tr>';
	 };

	 function calculAge($date_naissance) {
	    $dateN = new DateTime($date_naissance);
		$Maintenant = new DateTime(date("Y-m-d"));
		$interval = $dateN->diff($Maintenant);
		return $interval->y.' ans';
	}

	?>
        </tbody>
    </table>
    </div>
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
    $('#example').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/French.json"
            }
        } );
} );
</script>
<?php  include '../footer.php'; ?>