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
        'img_lists'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_categories');
    }
}
