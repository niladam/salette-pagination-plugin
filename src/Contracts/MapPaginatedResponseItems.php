<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Contracts;


use Salette\Http\Response;

interface MapPaginatedResponseItems
{
    /**
     * Map the items from the paginator
     *
     * @return array<mixed, mixed>
     */
    public function mapPaginatedResponseItems(Response $response): array;
}
