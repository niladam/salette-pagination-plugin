<?php
/*
 * salette-plugins | functions.php
 * https://www.webdirect.ro/
 * Copyright 2025 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/23/2025 11:13 PM    
*/

use Salette\PaginationPlugin\Helpers\Invade\Invader;
use Salette\PaginationPlugin\Helpers\Invade\StaticInvader;

if (! function_exists('invade')) {
    /**
     * @template T of object
     *
     * @param T|class-string $object
     * @return Invader<T>|StaticInvader
     */
    function invade($object)
    {
        if (is_object($object)) {
            return new Invader($object);
        }

        return new StaticInvader($object);
    }
}
