<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    
    protected $primaryKey = 'product_id';

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'product_id', 'product_id');
    }

    public function updateStock($id, $qty){
        $this->product[$id]['quantity'] -= $qty;
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['product_name'] ?? false, function($query, $product_name) {
            return $query->where('product_name', 'like', '%' . $product_name . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        });
    }
}
