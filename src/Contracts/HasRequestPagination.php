<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Contracts;

use Salette\Http\Connector;
use Salette\PaginationPlugin\Paginator;

interface HasRequestPagination
{
    /**
     * Paginate
     */
    public function paginate(Connector $connector): Paginator;
}
