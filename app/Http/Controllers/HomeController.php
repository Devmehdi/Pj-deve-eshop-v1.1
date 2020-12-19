<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use TCG\Voyager\Models\Category;
use App\Models\sousCategory;
use Session;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
  
    function Index()
    {
        $categories=category::all();
        $topcategories=Category::take(10)->get();
        $souscategories=sousCategory::wherenull('deleted_at')->get();
       
        return view("pages/index",['categories'=>$categories,"topcategories"=>$topcategories,"souscategories"=>$souscategories]);
    } 
    function Index2()
    {
        $categories=category::all();
        $topcategories=Category::take(10)->get();
        $souscategories=sousCategory::wherenull('deleted_at')->get();
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
        return view("pages/index2",['categories'=>$categories,'topcategories'=>$topcategories,'souscategories'=>$souscategories,'panels'=>$panels,'counts'=>$counts]);
    } 
}
