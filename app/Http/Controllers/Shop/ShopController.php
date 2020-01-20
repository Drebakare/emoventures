<?php

namespace App\Http\Controllers\Shop;

use App\Donation;
use App\Images;
use App\Payment;
use App\Product;
use App\ProductCategory;
use App\ProductReview;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function Shop(){
        $products = Product::getShopProducts();
        return view('Actions.shop', compact('products'));
    }

    public function shopProduct($name){
        $product = Product::getproductDetails($name);
        $product_images = Images::getproductImages($product->id);
        $other_products = Product::getOtherProducts($product->product_category_id);
        $categories = ProductCategory::getAllCategory();
        $comments = ProductReview::productComments($product->id);
        $can_comment = false;
        if (Auth::check()){
            $check_comment_status = Product::checkCommentEligibility($product->id, Auth::user()->id);
            if ($check_comment_status){
                $can_comment = true;
            }
            else{
                $can_comment = false;
            }
        }
        else{
            $can_comment = false;
        }

        return view('Actions.product-checkout', compact('product', 'product_images', 'other_products','categories','comments', 'can_comment'));
    }

    public function productSearch(Request $request){
        $products = Product::searchResult($request->search);
        return view('Actions.shop', compact('products'));
    }

    public function productCategory($category){
        $category_id = ProductCategory::getCategoryByName($category);
        $products = Product::getCategoryProducts($category_id->id);
        return view('Actions.shop', compact('products'));
    }

    public function remitPayment(Request $request){
        $payment_status = Payment::remitPayment($request);
        if($payment_status){
            $response = array(
                'status' => true,
                'msg' => 'Payment Successful, kindly comment'
            );
            return response()->json($response);
        }
        else{
            $response = array(
                'status' => false,
                'msg' => 'error remitting payment'
            );
            return response()->json($response);
        }

    }

    public function createComment( Request $request){
        $create_comment = ProductReview::createComment($request);
        if ($create_comment){
            $response = array(
                'status' => true,
                'msg' => 'Comment Successfully Added'
            );
            return response()->json($response);
        }
        else{
            $response = array(
                'status' => false,
                'msg' => 'Comment could not be added'
            );
            return response()->json($response);
        }
    }
}
