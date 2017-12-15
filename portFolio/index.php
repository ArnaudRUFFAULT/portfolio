<?php
//On demarre un session
session_start();
//Si la variable deco dans le get existe et qu'elle vaut portfolio, on ecrase toutes les info du portfolio enregistre en session
if(isset($_GET['deco'])){
    switch ($_GET['deco']) {
        case 'portfolio':
            unset($_SESSION['portfolio']);
            header('Location:index.php');
            exit;
    }
}
//On inclu notre fichier INI avec toutes les constantes nécessaires
include('config.php');
//On fait appel à notre autoload
spl_autoload_register(function($className){
	$folder = CLASSES_PATH;
	$extension = CLASSES_EXTENSION;
    //l'Autoload charge les Controllers
	if (strpos($className, 'Controller') !== false) {
		$folder = CONTROLLERS_PATH;
		$extension = CONTROLLERS_EXTENSION;
	}
    //l'Autoload charge les Modeles
	else if (strpos($className, 'Model') !== false) {
		$folder = MODELS_PATH;
		$extension = MODELS_EXTENSION;
	}
    //l'Autoload charge les Gestionnaires
    else if (strpos($className, 'Handler') !== false) {
        $folder = HANDLER_PATH;
        $extension = HANDLER_EXTENSION;
    }	
	$filename = $folder . DS . $className . $extension;
	if(file_exists($filename)){
		include($filename);
	}
});
//Notre index indique un controller et une action par defaut si le get est vide, soit l'acceuil
$params = array('controller'=>'acceuil','action'=>'afficherAcceuil');

//Si le get n'est pas vide, on ecrase les valeurs par defaut
$params = array_merge($params,$_GET);
//On définit le nom du controleur à appeler selon notre nomenclature
$controllerName = strtolower($params['controller']).'Controller';
//On définit le nom de l'action à invoquer selon notre nomenclature
$actionName = $params['action'] . 'Action';
//On instancie le controller approprie
if((!empty($_GET) && isset($_GET['controller'])) ||empty($_GET) ) {
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        //On entre les information du GET et du POST dans les attributs prévus à cet effet dans la class coreController
        $controller->setParameters($_GET);
        $controller->setData($_POST);
        //On vérifie que la méthode à invoquer existe , puis si c'est le cas on l'invoque.
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        }
        //Si la methode n'est pas connu, on génère le controller d'erreur qui va afficher un message personnalise
        else {
            $controller = new errorController();
            $controller->error404();
        }
    }
    //Si le controller n'est pas connu, on génère le controller d'erreur qui va afficher un message personnalise
    else {
        $controller = new errorController();
        $controller->error404();
    }
}
//Si la cle controller n'existe pas dans l'url, on génère le controller d'erreur qui va afficher un message personnalise
else{
    $controller = new errorController();
    $controller->error404();
}