<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        "keyword"
    ];

    public function product(){
        return $this->hasOne(Product::class);
    }

    public static function getAllCategory(){
        $categories = ProductCategory::all();
        return $categories;
    }

    public static function getCategoryByName($category){
        $category_id = ProductCategory::where('keyword', $category)->first();
        return $category_id;
    }

    public static function addNewCategory($keyword){
        $status = ProductCategory::create([
           "keyword" => $keyword
        ]);
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function removeCategory($id){
        $status = ProductCategory::where('id', $id)->delete();
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }
}
