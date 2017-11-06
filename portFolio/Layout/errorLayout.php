<!DOCTYPE html>
<html>
<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href=<?='"' . CSS_PATH . 'errorLayout' . CSS_EXTENSION . '"' ?>>
</head>
<body>
<div class="header">
    <?= $header ?>
</div>
<hr />
<div class="error">
    <?= $contenu ?>
</div>
<hr />
<div class="footer">
    <?= $footer ?>
</div>
</body>
</html>