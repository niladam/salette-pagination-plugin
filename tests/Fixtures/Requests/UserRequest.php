<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Requests;

use Salette\Enums\Method;
use Salette\Requests\Request;

class UserRequest extends Request
{
    public const METHOD = Method::GET;

    /**
     * Define the endpoint for the request.
     */
    public function resolveEndpoint(): string
    {
        return '/user';
    }
}
