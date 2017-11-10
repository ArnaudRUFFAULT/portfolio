<!-- Ceci est le gabarit commun à toutes les Views, chaque view affiche son titre dans la variable $titre et son contenu dans la variable $contenu, les variables $header et $footer sont automatiquement genere -->
<!DOCTYPE html>
<html>
<head>
	<title><?= $titre ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=<?='"' . CSS_PATH . 'commonLayout' . CSS_EXTENSION . '"' ?>>
</head>
<body>
    <!-- correspond au header, commun a toute les pages-->
    <div class="header">
        <?= $header ?>
    </div>
    <hr />
	<div class="corps">
		<?= $contenu ?>
	</div>
    <hr />
    <!-- correspond au footer, commun a toute les pages-->
    <div class="footer">
        <?= $footer ?>
    </div>
</body>
</html>