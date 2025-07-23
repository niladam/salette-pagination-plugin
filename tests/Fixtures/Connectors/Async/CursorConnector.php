<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Tests\Fixtures\Connectors\Async;

use Salette\Http\Response;
use Salette\PaginationPlugin\CursorPaginator;
use Salette\PaginationPlugin\Contracts\HasPagination;
use Salette\PaginationPlugin\Contracts\HasRequestPagination;
use Salette\PaginationPlugin\Tests\Fixtures\Connectors\TestConnector;
use Salette\Requests\Request;
class CursorConnector extends TestConnector implements HasPagination
{
    /**
     * Paginate over each page
     */
    public function paginate(Request $request): CursorPaginator
    {
        if ($request instanceof HasRequestPagination) {
            return $request->paginate($this);
        }

        return new class(connector: $this, request: $request) extends CursorPaginator {
            /**
             * Get the next cursor
             */
            protected function getNextCursor(Response $response)
            {
                $nextPageUrl = $response->json('next_page_url');
                parse_str(parse_url($nextPageUrl, PHP_URL_QUERY), $queryParams);

                return $queryParams['cursor'];
            }

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
