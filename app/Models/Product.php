<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'writer_name',
        'title',
        'desc',
        'img',
        'category_id',
        'price',
        'most_likes',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($customerId)
    {
        return $this->likes()->where('customer_id', $customerId)->exists();
    }

}
