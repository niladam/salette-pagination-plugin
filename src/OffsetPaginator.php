<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin;

use LogicException;
use Salette\Http\Response;
use Salette\PaginationPlugin\Traits\HasAsyncPagination;
use Salette\Requests\Request;
abstract class OffsetPaginator extends Paginator
{
    use HasAsyncPagination;

    /**
     * Apply the offset pagination
     */
    protected function applyPagination(Request $request): Request
    {
        if (is_null($this->perPageLimit)) {
            throw new LogicException('Please define the $perPageLimit property on your paginator or use the setPerPageLimit method');
        }

        $request->query()->merge([
            'limit' => $this->perPageLimit,
            'offset' => $this->getOffset(),
        ]);

        return $request;
    }

    /**
     * Get the offset for the paginator
     */
    protected function getOffset(): int
    {
        return ($this->page - 1) * $this->perPageLimit;
    }

    /**
     * Get the total number of pages
     */
    protected function getTotalPages(Response $response): int
    {
        throw new LogicException('Please implement the `getTotalPages` method on this paginator when using asynchronous pagination.');
    }
}
