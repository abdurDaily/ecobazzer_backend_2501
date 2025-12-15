<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Images\ProductImages;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function productImages()
  {
    return $this->hasMany(ProductImages::class);
  }
}
