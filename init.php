<?php

include 'framework-jin/jin/launcher.php';
include 'config/config.php';

use jin\db\DbConnexion;

date_default_timezone_set('GMT');

if(ERROR_REPORT){
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}else{
    ini_set('display_errors', 'Off');
}

//Initialize launcher for Aspic classes
include 'api/mechacroncore.php';
spl_autoload_register(array('mechacron\MechaCronCore', 'autoload'));

//Connexion BDD
DbConnexion::connectWithSqLite3('data/database.sqlite');