<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Requests;

use Salette\Enums\Method;
use Salette\Requests\Request;
use Salette\PaginationPlugin\Contracts\Paginatable;

class SuperheroPagedRequest extends Request implements Paginatable
{
    public const METHOD = Method::GET;

    /**
     * Define the endpoint for the request.
     */
    public function resolveEndpoint(): string
    {
        return '/superheroes/per-page';
    }
}
