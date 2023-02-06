<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>

<?php
	if (isset($_POST['NomVignette']) && $_POST['image-data'] <> '') {
		$data = $_POST['image-data'];
		list($pasUtile, $data) = explode(',', $data);
    // var_dump($data);
		list($NomFichier,$pasUtile) = explode('.', $_POST['NomVignette']);
		$data = base64_decode($data);
		file_put_contents('vignettes/'.$NomFichier.'.png', $data);
		$image = imagecreatefrompng('vignettes/'.$NomFichier.'.png');
		imagejpeg($image, 'vignettes/'.$NomFichier.'.jpg', 70);
		imagedestroy($image);
		unlink('vignettes/'.$NomFichier.'.png');
		};
?>

<div class="general-content">
<h1>Les vignettes</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Vous devez faire le script pour que les vignettes soient enregistrées dans le répertoires "vignettes", les vignettes dans ce répertoire doivent être visibles sur cette page. La vignette doit avoir le même nom que le fichier original. Pour info, le format pour l'image envoyée par le formulaire est un .png, il vous faudra donc convertir d'une manière ou d'une autre l'image téléchargée pour que l'image finale soit au format .jpg
    </p>
<h2>Faire une vignette</h2>
<div>
<div class="image-uploader">
    <form action="/vignettes/"  method="post">
      <div class="image-editor">
        <input type="file" class="cropit-image-input btn btn-default btn-lg" name="NomVignette">
        <div class="cropit-preview"></div>
        <div class="image-size-label">
          Redimensionner l'image
        </div>
        <input type="range" class="cropit-image-zoom-input">
        <input type="hidden" name="image-data" class="hidden-image-data" />
        <button type="submit" class="btn btn-default btn-lg">Enregistrer la vignette</button>
      </div>
    </form>
 </div>
 </div>
 <h2>Vignettes disponibles</h2>
<!-- <img src="/vignettes/vignettes/ballerine-acajou-gris.jpg" class="vignettes"><img src="/vignettes/vignettes/ballerine-ella-rose.jpg" class="vignettes"><img src="/vignettes/vignettes/ballerine-ella-taupe.jpg" class="vignettes"><img src="/vignettes/vignettes/lpb-escarpin-beige.jpg" class="vignettes"><img src="/vignettes/vignettes/lpb-escarpin-noir.jpg" class="vignettes"><img src="/vignettes/vignettes/reine.jpg" class="vignettes"><img src="/vignettes/vignettes/saumon.jpg" class="vignettes"><img src="/vignettes/vignettes/savoyarde.jpg" class="vignettes"> -->
 <?php 
 $ListeImages = array_slice(scandir('vignettes'), 2);
 foreach ($ListeImages as $Image) {
	 echo '<img src="/vignettes/vignettes/'.$Image.'" class="vignettes">';
	 }
 ?>
<!-- Fin php -->
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
    <script>
      $(function() {
        $('.image-editor').cropit();

        $('form').submit(function() {
          var imageData = $('.image-editor').cropit('export');
          $('.hidden-image-data').val(imageData);

          return true;
        });
      });
    </script>
<?php  include '../footer.php'; ?>