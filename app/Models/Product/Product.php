<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      public function category(){
        return $this->belongsTo(Category::class);
    }
}
