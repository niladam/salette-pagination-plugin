<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Connectors;

use Salette\Requests\Request;
use Salette\Http\Response;
use Salette\PaginationPlugin\OffsetPaginator;
use Salette\PaginationPlugin\Contracts\HasPagination;
use Salette\PaginationPlugin\Contracts\HasRequestPagination;

class OffsetConnector extends TestConnector implements HasPagination
{
    /**
     * Paginate over each page
     */
    public function paginate(Request $request): OffsetPaginator
    {
        if ($request instanceof HasRequestPagination) {
            return $request->paginate($this);
        }

        return new class(connector: $this, request: $request) extends OffsetPaginator {
            /**
             * Per Page
             */
            protected ?int $perPageLimit = 5;

            /**
             * Check if we are on the last page
             */
            protected function isLastPage(Response $response): bool
            {
                return (int)$response->json('total') === $this->getOffset();
            }

            /**
             * Get the results from the page
             */
            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data') ?? [];
            }
        };
    }
}
