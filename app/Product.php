<?php

namespace App;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class Product extends Model
{
    protected $fillable = [
        "product_name", "amount", "product_category_id", "product_details", "product_description", "main_image_name"
    ];

    public function productreviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function images(){
        return $this->hasMany(Images::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public static function getproducts(){
        $products = Product::all();
        return $products;
    }
    public static function getShopProducts(){
        $products = Product::paginate(4);
        return $products;
    }
    public static function searchResult($search){
        $products = Product::where('product_name', 'LIKE', '%' . $search. '%')->paginate(4);
        return $products;
    }
    public static function getproductDetails($name){
        $product = Product::where('product_name', $name)->first();
        return $product;
    }
    public static function getOtherProducts($category_id){
        $products = Product::where('product_category_id', $category_id)->get();
        return $products;
    }
    public static function getCategoryProducts($category){
        $products = Product::where('product_category_id', $category)->paginate(4);
        return $products;
    }
    public static function checkCommentEligibility($product_id, $user_id){
        $status = Payment::where([['product_id', $product_id], ['user_id', $user_id]])->first();
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }

}
