<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>
<div class="general-content">
<h1>Les news du monde</h1>
    <h2>Explications sur l'exercice</h2>
    <p>A partir de l'url suivante <a href="https://www.lemonde.fr/sitemap_news.xml" target="_blank">https://www.lemonde.fr/sitemap_news.xml</a>, allez chercher toutes les dernières news du monde, présenter le titre, la date et évidemment un lien sur le titre pour lire l'article !
    </p>
<h2>Résultat</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Date</th>
            </tr>
        </tfoot>
        <tbody>
	<?php
        foreach(simplexml_load_file('https://www.lemonde.fr/sitemap_news.xml') as $news) {
            $newsData = $news->children('news',true);
            echo  '<tr><td><a href="'.$news->loc.'" target="_blank">'.$newsData->news->title. '</a></td><td>'.date_format(new DateTime($newsData->news->publication_date),"d/m/Y H:i:s").'</td></tr>';
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