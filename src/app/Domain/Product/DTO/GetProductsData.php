<?php

namespace App\Domain\Product\DTO;

use App\Domain\Product\Models\Product;

class GetProductsData
{
    private array $filter;
    private int $limit = Product::PRODUCT_LIMIT;
    private int $offset  = Product::PRODUCT_OFFSET;

    /**
     * @param array $filter
     * @param int $limit
     * @param int $offset
     */
    public function __construct(array $filter, int $limit, int $offset)
    {
        $this->filter = $filter;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getFilter(): array
    {
        return $this->filter;
    }

    public function getLimit(): string
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
