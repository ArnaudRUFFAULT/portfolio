<?php

define('DS',DIRECTORY_SEPARATOR);

//Definit les chemins a emprunter pur l'autoload des classes, controllers et modeles
define('CLASSES_PATH', 'Classes');
define('CLASSES_EXTENSION', '.class.php');
define('CONTROLLERS_PATH', 'Controllers');
define('CONTROLLERS_EXTENSION', '.php');
define('MODELS_PATH', 'Models');
define('MODELS_EXTENSION', '.php');
define('HANDLER_PATH', 'Handlers');
define('HANDLER_EXTENSION', '.php');


//Définit les paramètres de la connexion à la BDD
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'root');
define('DB_PASS','');


//Chemin vers le Layout commun
define('COMMON','.' . DS . 'Layout' . DS . 'commonLayout.php');
//Chemin vers le Layout Header
define('HEADER','.' . DS . 'Layout' . DS . 'headerLayout.php');
//Chemin vers le Layout Footer
define('FOOTER','.' . DS . 'Layout' . DS . 'footerLayout.php');
//Chemin vers le Layout Error
define('ERROR','.' . DS . 'Layout' . DS . 'errorLayout.php');

//Chemin vers les Views
define('VIEWS','.' . DS . 'Views' . DS);


//Chemin vers les css
define('CSS_PATH', '.' . DS . 'assets' . DS . 'css' .DS );
define('CSS_EXTENSION','Style.css' );



