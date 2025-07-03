<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['categories'];

    public function lists()
    {
        return $this->hasMany(Lists::class, 'id_categories');
    }
}
