<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'code',
        'name',
        'tag',
        'headline',
        'summary',
        'ideal',
        'display',
        'method',
        'frequencies',
        'weight',
        'range',
        'extra',
        'features',
        'specs',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'specs' => 'array',
        ];
    }

    public function toCatalogArray(): array
    {
        return [
            'slug' => $this->slug,
            'code' => $this->code,
            'name' => $this->name,
            'tag' => $this->tag,
            'headline' => $this->headline,
            'summary' => $this->summary,
            'ideal' => $this->ideal,
            'display' => $this->display,
            'method' => $this->method,
            'frequencies' => $this->frequencies,
            'weight' => $this->weight,
            'range' => $this->range,
            'extra' => $this->extra,
            'features' => $this->features ?? [],
            'specs' => $this->specs ?? [],
        ];
    }
}
