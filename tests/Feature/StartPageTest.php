<?php

declare(strict_types=1);

use Salette\PaginationPlugin\Tests\Fixtures\Connectors\PagedConnector;
use Salette\PaginationPlugin\Tests\Fixtures\Requests\SuperheroPagedRequest;
use Salette\PaginationPlugin\Tests\Fixtures\Connectors\CustomStartPagePagedConnector;

test('you can specify a start page on a paginator class', function () {
    $connector = new CustomStartPagePagedConnector;
    $request = new SuperheroPagedRequest();
    $paginator = $connector->paginate($request);

    $superheroes = [];
    $iteratorCounter = 0;

    foreach ($paginator as $item) {
        $iteratorCounter++;
        $superheroes = array_merge($superheroes, $item->json('data'));
    }

    expect($iteratorCounter)
        ->toBe(2)
        ->and($paginator->getTotalResults())->toEqual(10);

    $mapped = array_map(static fn (array $superhero) => $superhero['id'], $superheroes);

    expect($mapped)->toEqual([11, 12, 13, 14, 15, 16, 17, 18, 19, 20,]);
});

test('you can specify a start page on a paginator instance', function () {
    $connector = new PagedConnector;
    $request = new SuperheroPagedRequest();
    $paginator = $connector->paginate($request);

    $superheroes = [];
    $iteratorCounter = 0;

    $paginator->setStartPage(3);

    foreach ($paginator as $item) {
        $iteratorCounter++;
        $superheroes = array_merge($superheroes, $item->json('data'));
    }

    expect($iteratorCounter)
        ->toBe(2)
        ->and($paginator->getTotalResults())->toEqual(10);

    $mapped = array_map(static fn (array $superhero) => $superhero['id'], $superheroes);

    expect($mapped)->toEqual([11, 12, 13, 14, 15, 16, 17, 18, 19, 20,]);
});
