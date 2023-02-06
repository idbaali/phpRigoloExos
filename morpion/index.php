<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>


<div class="general-content">
<h1>Le morpion</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Faire un jeu de morpion, l'adversaire et l'ordinateur, il n'y a pas deux joueur.
    </p>
<h2>Faire une partie</h2>

<?php 
if (isset($_GET['rejouer']) && $_GET['rejouer'] === 'ok') {
session_unset();
};

$TheWinnerIs = '';

if (isset($_GET['jouer']) && !isset($_SESSION[$_GET['jouer']]) ) {
	$_SESSION[$_GET['jouer']] = 'croix';
	
	if(VerifierGagnant()) {
		$TheWinnerIs='Bravo, tu as gagné !!<br>';
		} else {
			 $PlaceLibre = [];
			for ($i=1; $i < 10; $i++) {
				 if (!isset($_SESSION['zone'.$i])) { 
				 	$PlaceLibre[] = 'zone'.$i;
				 };
			};
			if (count($PlaceLibre) > 0) {
			$ZoneAuHasard = rand(0, count($PlaceLibre)-1);
			$_SESSION[$PlaceLibre[$ZoneAuHasard]] = 'rond';
				if (VerifierGagnant()) {
					$TheWinnerIs='Désolé, l\'ordi à gagné !!<br>';
					};
			};
		};
};
	
	
function PlacementImage($zone) {
	if (isset($_SESSION[$zone])) {
		echo '<img src="/img/'.$_SESSION[$zone].'.png">';
		} elseif (!empty($TheWinnerIs)) {
		echo '<img src="/img/vide.png">';
		} else {
		echo '<a href="/morpion/?jouer='.$zone.'"><img src="/img/vide.png"></a>';
			};
	
	};
	
function VerifierGagnant() {
	if (VerifierLigne('zone1','zone2','zone3') or VerifierLigne('zone4','zone5','zone6') or VerifierLigne('zone7','zone8','zone9') or VerifierLigne('zone1','zone4','zone7') or VerifierLigne('zone2','zone5','zone8') or VerifierLigne('zone3','zone6','zone9') or VerifierLigne('zone1','zone5','zone9') or VerifierLigne('zone3','zone5','zone7')) {
		return true;
		} else {
		return false;	
		};
	};
	
function VerifierLigne($zoneA,$zoneB,$zoneC) {
	if (isset($_SESSION[$zoneA]) && isset($_SESSION[$zoneB]) && isset($_SESSION[$zoneC]) && $_SESSION[$zoneA] === $_SESSION[$zoneB] && $_SESSION[$zoneB] === $_SESSION[$zoneC]) {
		return true;
		} else {
		return false;	
		};
	}
?>
<?php
if (VerifierGagnant()) {
	echo '<div style="text-align:center;margin-bottom:30px;width:100%;"><a href="/morpion/?rejouer=ok" class="btn btn-info" style="font-size:50px;padding-left:100px;padding-right:100px;">'.$TheWinnerIs.'Rejouer une partie</a></div>';
} elseif (count($_SESSION) === 9) {
	echo '<div style="text-align:center;margin-bottom:30px;width:100%;"><a href="/morpion/?rejouer=ok" class="btn btn-info" style="font-size:50px;padding-left:100px;padding-right:100px;">Pas de gagnant !!<br>Rejouer une partie</a></div>';
	};
?>
<table id="center">
  <tbody>
    <tr>
      <td class="carre" id="Zonea1"><?php PlacementImage('zone1');?></td>
      <td class="carre" id="Zonea2"><?php PlacementImage('zone2');?></td>
      <td class="carre" id="Zonea3"><?php PlacementImage('zone3');?></td>
    </tr>
    <tr>
      <td class="carre" id="Zoneb1"><?php PlacementImage('zone4');?></td>
      <td class="carre" id="Zoneb2"><?php PlacementImage('zone5');?></td>
      <td class="carre" id="Zoneb3"><?php PlacementImage('zone6');?></td>
    </tr>
    <tr>
      <td class="carre" id="Zonec1"><?php PlacementImage('zone7');?></td>
      <td class="carre" id="Zonec2"><?php PlacementImage('zone8');?></td>
      <td class="carre" id="Zonec3"><?php PlacementImage('zone9');?></td>
    </tr>
  </tbody>
</table>
</div>

<!-- 
<div style="text-align:center;margin-bottom:30px;width:100%;"><a href="/morpion/?rejouer=ok" class="btn btn-info" style="font-size:50px;padding-left:100px;padding-right:100px;">Bravo, tu as gagné !!<br>Rejouer une partie</a></div><table id="center">
  <tbody>
    <tr>
      <td class="carre" id="Zonea1"><img src="/img/croix.png"></td>
      <td class="carre" id="Zonea2"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonea3"><img src="/img/croix.png"></td>
    </tr>
    <tr>
      <td class="carre" id="Zoneb1"><img src="/img/vide.png"></td>
      <td class="carre" id="Zoneb2"><img src="/img/croix.png"></td>
      <td class="carre" id="Zoneb3"><img src="/img/vide.png"></td>
    </tr>
    <tr>
      <td class="carre" id="Zonec1"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonec2"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonec3"><img src="/img/croix.png"></td>
    </tr>
  </tbody>
</table>
</div> -->

<!-- Fin php -->
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
<?php  include '../footer.php'; ?>