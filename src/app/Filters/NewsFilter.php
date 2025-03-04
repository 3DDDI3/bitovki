<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class NewsFilter extends BaseFilter
{
    /**
     * Фильтрация по году
     *
     * @param string $value
     * @return Builder
     */
    protected function year(string $value): Builder
    {
        return $this->builder->whereYear('created_at', $value);
    }
}
