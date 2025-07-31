<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['catTitle', 'catSlug'];
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
