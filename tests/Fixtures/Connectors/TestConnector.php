<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Connectors;

use Salette\Http\Connector;
use Salette\Traits\Plugins\AlwaysThrowOnErrors;

abstract class TestConnector extends Connector
{
    use AlwaysThrowOnErrors;

    /**
     * Define the base URL of the API.
     */
    public function resolveBaseUrl(): string
    {
        return 'https://tests.Salette.dev/api';
    }
}
