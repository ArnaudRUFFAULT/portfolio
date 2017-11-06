<!-- Ceci est le gabarit commun à toutes les Views, chaque view affiche son titre dans la variable $titre et son contenu dans la variable $contenu -->
<!DOCTYPE html>
<html>
<head>
	<title><?= $titre ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href=<?='"' . CSS_PATH . 'commonLayout' . CSS_EXTENSION . '"' ?>>
</head>
<body>
    <div class="header">
        <?= $header ?>
    </div>
    <hr />
	<div class="corps">
		<?= $contenu ?>
	</div>
    <hr />
    <div class="footer">
        <?= $footer ?>
    </div>
</body>
</html>