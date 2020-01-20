<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Images extends Model
{
    protected $fillable = [
        "product_id", "image_name"
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function getProductImages($product_id){
        $images = Images::where('product_id', $product_id)->get();
        return $images;
    }

}
