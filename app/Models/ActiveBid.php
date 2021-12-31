<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveBid extends Model
{
    use HasFactory;

    protected $table = 'active_bid';
    
    protected $primaryKey = 'bid_id';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
