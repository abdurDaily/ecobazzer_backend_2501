<?php

namespace App\Models\Images;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
     public function product(){
        return $this->belongsTo(Product::class);
    }
}
