<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Contracts;

use Salette\PaginationPlugin\Paginator;
use Salette\Requests\Request;

interface HasPagination
{
    /**
     * Paginate
     */
    public function paginate(Request $request): Paginator;
}
