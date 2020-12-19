<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SousCategory;
use TCG\Voyager\Models\Category;
use Session;
use App\Models\precommande;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function shopgrid()
    {
        $categories=category::all();
        $products=Product::wherenull('deleted_at')->get();
        $panels=DB::table("products")
                                    ->select('productname','price','imageproduct')
                                    ->join('precommandes','product_id','=','products.id')
                                    ->join('users','users.id','=','precommandes.user_id')
                                    ->get();
        $counts=DB::table("products")
                                    ->select('productname','price')
                                    ->join('precommandes','product_id','=','products.id')
                                    ->join('users','users.id','=','precommandes.user_id')
                                    ->get()->count();
                                 
        return view("pages/shopgrid",['categories'=>$categories,'products'=>$products,'panels'=>$panels,'counts'=>$counts]);
    }
    public function getviewproduct()
    {
        $categories=category::all();
        $souscategories=sousCategory::wherenull('deleted_at')->get();
        $products=Product::wherenull('deleted_at')->get();
        $panels=DB::table("products")
        ->select('productname','price','imageproduct')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
         $counts=DB::table("products")
        ->select('productname','price')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get()->count();
        return view("pages/product",["products"=>$products,"categories"=>$categories,"souscategories"=>$souscategories,'panels'=>$panels,'counts'=>$counts]);
    }
    public function cart(Request $request)
    {
        $categories=category::all();
        \Session::get('user_id');
        $panels=DB::table("products")
        ->select('productname','price','imageproduct')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
         $counts=DB::table("products")
        ->select('productname','price')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get()->count();
        return view("pages/cart",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
        /*$var= $request->ip();
        return $var;*/
    }
    public function checkout()
    {
        $categories=Category::all();
        $panels=DB::table("products")
        ->select('productname','price','imageproduct')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
         $counts=DB::table("products")
        ->select('productname','price')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get()->count();
        return view("pages/checkout",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
    }
    public function addtocart()
    {
        $precommande=new PreCommande();
        $precommande->product_id=1;
        $precommande->user_id=\Session::get('user_id');
        $precommande->active_flage=1;
        $precommande->save();
        return view("pages.shopgrid");
    }
    public function blog()
    {
         $categories=Category::all();
        $panels=DB::table("products")
        ->select('productname','price','imageproduct')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get();
         $counts=DB::table("products")
        ->select('productname','price')
        ->join('precommandes','product_id','=','products.id')
        ->join('users','users.id','=','precommandes.user_id')
        ->get()->count();
        return view("pages.blog",['categories'=>$categories,'panels'=>$panels,'counts'=>$counts]);
    }

}
