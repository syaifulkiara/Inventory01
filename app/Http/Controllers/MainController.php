<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Product;
class MainController extends Controller
{
    public function index()
    {
        //$products   = Product::orderBy('created_at','DESC')->paginate(12);
        $products   = Product::inRandomOrder()->paginate(12);
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();
        return view('main', compact('products','categories','brands','units'));
    }

    public function detail($slug)
    {
        $products   = Product::where('slug', $slug)->first();
        $relateds   = Product::where('category_id', '=', $products->category->id)
            ->where('id', '!=', $products->id)
            ->get();
        return view('details', compact('products','relateds'));
    }
    
    public function cari(Request $request)
    {
        $products = Product::where('name', $request->term)->orWhere('name','LIKE','%'.$request->term.'%')->paginate(8);
        // $products   = Product::where([
        //                 ['name','!=', null],
        //                 [function ($query) use ($request){
        //                     if (($term = $request->term)){
        //                         $query->orWhere('name','LIKE','%'.$term.'%')->get();
        //                     }
        //                 }]
        //             ])->orderBy("id","DESC")->paginate(12);
        // $term = $request->term;
        // $products = Product::where('name', $request->term)->orWhere('name','LIKE',"%".$term."%")->paginate(8);

        return view('main',compact('products'));
    }
}
