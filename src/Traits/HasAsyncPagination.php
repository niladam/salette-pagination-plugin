<?php

declare(strict_types=1);

namespace Salette\PaginationPlugin\Traits;

use Salette\Http\Pool;
use Salette\Http\Response;
use Salette\Requests\Request;

trait HasAsyncPagination
{
    /**
     * Determines if async is enabled or not
     */
    protected bool $async = false;

    /**
     * Enable or disable async pagination
     *
     * @return $this
     */
    public function async(bool $async = true): self
    {
        $this->async = $async;

        return $this;
    }

    /**
     * Create an async pool for the iterator
     */
    public function pool($concurrency = 5, ?callable $responseHandler = null, ?callable $exceptionHandler = null): Pool
    {
        /** @var iterable<mixed, Request> $iterator */
        $iterator = clone $this->async();

        return $this->connector->pool($iterator, $concurrency, $responseHandler, $exceptionHandler);
    }

    /**
     * Get the total number of pages
     */
    abstract protected function getTotalPages(Response $response): int;
}
