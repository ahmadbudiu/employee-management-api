<?php

namespace App\EloquentFilters\Employee;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('first_name', 'like', '%' . $value . '%')
            ->orWhere('last_name', 'like', '%' . $value . '%');
    }
}
