<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'image_path', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
