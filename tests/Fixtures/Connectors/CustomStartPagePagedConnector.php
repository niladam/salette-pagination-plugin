<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Connectors;

use Salette\Requests\Request;
use Salette\Http\Response;
use Salette\PaginationPlugin\PagedPaginator;
use Salette\PaginationPlugin\Contracts\HasPagination;
use Salette\PaginationPlugin\Contracts\HasRequestPagination;

class CustomStartPagePagedConnector extends TestConnector implements HasPagination
{
    /**
     * Paginate over each page
     */
    public function paginate(Request $request): PagedPaginator
    {
        if ($request instanceof HasRequestPagination) {
            return $request->paginate($this);
        }

        return new class(connector: $this, request: $request) extends PagedPaginator {
            /**
             * Set a custom start page
             */
            protected int $startPage = 3;

            /**
             * Check if we are on the last page
             */
            protected function isLastPage(Response $response): bool
            {
                return empty($response->json('next_page_url'));
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
