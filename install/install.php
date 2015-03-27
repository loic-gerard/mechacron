<?php

include '../init.php';

use mechacron\Secure;
use jin\db\DbConnexion;
use jin\query\Query;

Secure::onlyConsole();

echo 'Creation de la table CALLS : ';
$q = new Query();
$q->setRequest('CREATE TABLE utilisateur
(
    id INT PRIMARY KEY NOT NULL,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(255),
    date_naissance DATE,
    pays VARCHAR(255),
    ville VARCHAR(255),
    code_postal VARCHAR(5),
    nombre_achat INT
)');
$q->execute();
echo $q->getSql();