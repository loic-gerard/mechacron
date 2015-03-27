<?php

namespace mechacron;

use mechacron\MechaCronException;

class Secure{
    public static function onlyConsole(){
        if(php_sapi_name() === 'cli'){
            throw new MechaCronException('Script uniquement appelable en mode console (CLI)', MechaCronException::CRITICAL_SECURE_CLIREQUIRED);
        }
    }
}