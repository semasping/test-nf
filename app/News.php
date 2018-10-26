<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeOfCategory($query, $category_id)
    {
        if (!empty($category_id)) {
            return $query->where('category_id', $category_id);
        }
        return $query;

    }
}
