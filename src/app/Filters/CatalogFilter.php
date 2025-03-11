<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProductFilter
 */
class CatalogFilter extends BaseFilter
{
    /**
     * Фильтрация по категории
     *
     * @param string $value
     * @return Builder
     */
    protected function type(string $value): Builder
    {
        return $this->builder->whereHas('type', function ($query) use ($value) {
            $query->where(['type' => $value]);
        });
    }
}
