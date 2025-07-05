<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = [
        'id_categories',
        'nama',
        'desc',
        'address',
        'email',
        'telp',
        'owner',
        'year',
        'full_desc',
        'about',
        'products',
        'op_hour',
        'ig_url',
        'tiktok_url',
        'img_lists',
        'img_lists_2',
        'img_lists_3',
        'img_lists_4'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_categories');
    }

    /**
     * Get the full URL for the image
     */
    public function getImageUrlAttribute()
    {
        if ($this->img_lists) {
            return asset('storage/' . $this->img_lists);
        }
        return null;
    }

    /**
     * Get all image URLs
     */
    public function getAllImagesAttribute()
    {
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $field = $i === 1 ? 'img_lists' : 'img_lists_' . $i;
            if ($this->$field) {
                $images[] = asset('storage/' . $this->$field);
            }
        }
        return $images;
    }

    /**
     * Get all image paths
     */
    public function getAllImagePathsAttribute()
    {
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            $field = $i === 1 ? 'img_lists' : 'img_lists_' . $i;
            if ($this->$field) {
                $images[] = $this->$field;
            }
        }
        return $images;
    }
}
