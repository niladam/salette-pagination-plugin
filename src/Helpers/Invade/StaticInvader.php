<?php
/*
 * salette-plugins | StaticInvader.php
 * https://www.webdirect.ro/
 * Copyright 2025 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 7/23/2025 11:12 PM    
*/

namespace Salette\PaginationPlugin\Helpers\Invade;
use Exception;
class StaticInvader {
    public string $className;
    private ?string $method = null;

    /**
     * @param class-string $className
     */
    public function __construct(
        string $className,
    ) {
        $this->className = $className;
    }

    public function get(string $name)
    {
        return (fn () => self::${$name})->bindTo(null, $this->className)();
    }

    public function set(string $name,  $value): void
    {
        (fn ($value) => self::${$name} = $value)->bindTo(null, $this->className)($value);
    }

    public function method(string $name): self
    {
        $this->method = $name;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function call(...$params)
    {
        if ($this->method === null) {
            throw new Exception(
                'No method to be called. Use it like: invadeStatic(Foo::class)->method(\'bar\')->call()'
            );
        }

        return (fn ($method) => self::{$method}(...$params))->bindTo(null, $this->className)($this->method);
    }
}
