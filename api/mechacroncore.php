<?php

namespace mechacron;

/**
 * Tâches de bas niveau de l'application MechaCron
 * @author Loïc Gerard
 */
class MechaCronCore {

    /**
     * Fonction de chargement automatique des classes
     * @param  string $className Chemin complet de la classe requise
     */
    public static function autoload($className) {
        $tab = explode('\\', $className);
        $path = strtolower(implode(DIRECTORY_SEPARATOR, $tab)) . '.php';
        $path = str_replace('mechacron'.DIRECTORY_SEPARATOR, 'api'.DIRECTORY_SEPARATOR, $path);
        $path = str_replace('api'.DIRECTORY_SEPARATOR.'mechacroncore.php', '', __FILE__) . $path;

        if (is_file($path)) {
            require($path);
        }
    }

}
