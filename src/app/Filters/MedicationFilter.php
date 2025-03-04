<?php

namespace App\Filters;

use App\Models\Medication;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProductFilter
 */
class MedicationFilter extends BaseFilter
{
    /**
     * Фильтрация по названию
     *
     * @param string $value
     * @return Builder
     */
    protected function title(string $value): Builder
    {
        return $this->builder->where(['title' => $value]);
    }

    /**
     * Фильтрация по категории
     *
     * @param string $value
     * @return Builder
     */
    protected function type(array $value): Builder
    {
        return $this->builder->whereHas('type', function ($query) use ($value) {
            $query->whereIn('type', $value);
        });
    }

    protected function search(string $value)
    {
        return $this->builder->whereHas('preview', function ($query) use ($value) {
            $query->where('title', 'like', "%$value%");
        });
    }
}
