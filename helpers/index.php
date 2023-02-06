<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>

<div class="general-content">
<h1>Les helpers</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Faites une requête dans la base de données liées à ces exercices pour retourner la totalité des apprenants. Faites du PHP pour mélanger ce résultat et obtenir 4 apprenants au hasard.
    </p>
<h2>Résultat</h2>


<?php
$getApprenants = $dbconnexion->query('select * from users');
$allApprenants = $getApprenants->fetchAll();
shuffle($allApprenants);
for ($i=0;$i < 4;$i++) {
    echo '<div class="choix-aleatoire">'.strtoupper($allApprenants[$i]['prenom']).' '.$allApprenants[$i]['nom'].'</div>';
    };
?>

<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
<?php  include '../footer.php'; ?>