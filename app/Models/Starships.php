<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Starships extends Model
{
    use HasFactory, Searchable;



    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'pilots' => 'json',
        'films' => 'json',
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'model' => $this->model,
        ];
    }

    public function scopeModel(Builder $query, $model)
    {
        $query->whereModel('model', $model);
    }

    public function scopeName(Builder $query, $name)
    {
        $query->whereName('model', $name);
    }
}
