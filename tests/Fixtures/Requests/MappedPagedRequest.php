<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Requests;

use Salette\Enums\Method;
use Salette\Requests\Request;
use Salette\Http\Response;
use Salette\PaginationPlugin\Contracts\Paginatable;
use Salette\PaginationPlugin\Contracts\MapPaginatedResponseItems;

class MappedPagedRequest extends Request implements Paginatable, MapPaginatedResponseItems
{
    public const METHOD = Method::GET;

    /**
     * Define the endpoint for the request.
     */
    public function resolveEndpoint(): string
    {
        return '/superheroes/per-page';
    }

    /**
     * Map the items from the paginator
     */
    public function mapPaginatedResponseItems(Response $response): array
    {
        return $response->collect('data')->pluck('superhero')->toArray();
    }
}
