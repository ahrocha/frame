<?php

function autoload($classe)
{
    $classe = str_replace('\\', '/', $classe);
    
    foreach(array('.class', '.trait') as $extensao){
        if(file_exists(__DIR__ . "/../app/$classe"."$extensao.php")){
            require_once __DIR__ . "/../app/$classe"."$extensao.php";
        }
    }
}

spl_autoload_register('autoload');