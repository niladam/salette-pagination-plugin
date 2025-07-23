<?php
/*
 * salette-plugins | Invader.php
 * https://www.webdirect.ro/
 * Copyright 2025 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/23/2025 11:11 PM    
*/
namespace Salette\PaginationPlugin\Helpers\Invade;
class Invader {
    public object $obj;

    /**
     * @param T $obj
     */
    public function __construct(
        object $obj
    ) {
        $this->obj = $obj;
    }

    public function __get(string $name)
    {
        return (fn () => $this->{$name})->call($this->obj);
    }

    public function __set(string $name,  $value): void
    {
        (fn () => $this->{$name} = $value)->call($this->obj);
    }

    public function __call(string $name, array $params = [])
    {
        return (fn () => $this->{$name}(...$params))->call($this->obj);
    }
}
