<?php

namespace App\Domain\Product\Gateways;

use App\Domain\Product\DTO\GetProductsData;
use App\Domain\Product\Models\Product;
use Illuminate\Support\Collection;

/**
 *
 */
class ProductGateway
{
    /**
     * @var array
     */
    protected array $filter = [];

    /**
     * @param GetProductsData $data
     * @return Collection
     */
    public function getAllProducts(GetProductsData $data): Collection
    {
        $this->setFilter($data->getFilter());

        $selectRaw = "products.*";
        $query = Product::selectRaw($selectRaw)
            ->distinct();
        if ($this->filter) {
            $product_filter_ids = [];

            foreach ($this->filter as $key => $item) {
                $product_filter_ids = array_merge($product_filter_ids, $this->filter[$key]);
            }

            $query->join('product_filter_value as pfv', 'pfv.product_id', '=', 'products.id')
                ->whereIn('pfv.product_filter_id', $product_filter_ids);
        }

        $query->orderBy('id')
            ->offset($data->getOffset())
            ->limit($data->getLimit());

        return $query->get();
    }

    /**
     * @param array|null $filter
     * @return ProductGateway
     */
    public function setFilter(?array $filter): ProductGateway
    {
        if ($filter) {
            $this->filter = $filter;

            foreach ($filter as $key => $item) {
                if (!empty($item)) {
                    $this->filter[$key] = $this->prepareForArray($filter, $key);
                }
            }
        }
        return $this;
    }

    /**
     * @param array $data
     * @param string $key
     * @return array
     */
    public static function prepareForArray(array $data, string $key): array
    {
        if (!isset($data[$key])) {
            return [];
        }
        if (is_array($data[$key])) {
            return $data[$key];
        }
        return [$data[$key]];
    }
}
