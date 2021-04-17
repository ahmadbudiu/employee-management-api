<?php

namespace App\EloquentFilters\Employee;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class EmailFilter extends Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('email', 'like', '%' . $value . '%');
    }
}
