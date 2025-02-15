<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'description',
        'slug',
        'price'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $originalSlug = Str::slug($product->description);
            $slug = $originalSlug;
            $count = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $product->slug = $slug;
        });

        static::updating(function ($product) {
            $originalSlug = Str::slug($product->description);
            $slug = $originalSlug;
            $count = 1;

            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $product->slug = $slug;
        });
    }
}
