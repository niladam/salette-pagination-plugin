<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Data;

class Superhero
{
    public int $id;
    public string $superhero;
    public string $publisher;
    public string $alter_ego;
    public string $first_appearance;
    public string $characters;

    public function __construct(
        int $id,
        string $superhero,
        string $publisher,
        string $alter_ego,
        string $first_appearance,
        string $characters
    ) {
        $this->characters = $characters;
        $this->first_appearance = $first_appearance;
        $this->alter_ego = $alter_ego;
        $this->publisher = $publisher;
        $this->superhero = $superhero;
        $this->id = $id;
        //
    }
}
