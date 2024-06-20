<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class item extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'item_code',
        'item_name',
        'cover',
        'slug',
        'category_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'item_name'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the 'saving' event on the model
        static::saving(function ($item) {
            // Generate a new slug if the item_name has changed
            if ($item->isDirty('item_name')) {
                $item->slug = Str::slug($item->item_name);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
