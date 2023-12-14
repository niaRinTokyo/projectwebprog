<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'car_code', 'model', 'preview', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'model'
            ]
        ];
    }

    /**
     * The roles that belong to the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(category::class, 'car_category', 'car_id', 'category_id');
    }
}
