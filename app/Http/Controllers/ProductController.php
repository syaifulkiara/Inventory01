<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
Use Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products   = Product::all();
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();
        $users      = User::all();
        return view('products.index', compact('products','categories','brands','units','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products   = Product::all();
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();
        return view('products.create', compact('products','categories','brands','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|min:3'
        ]);

        $products               = new Product;
        $products->name         = $request->name;
        $products->slug         = Str::slug($request->name);
        $products->code_product = $request->code_product;
        $products->stock        = $request->stock;
        $products->category_id  = $request->category_id;
        $products->brand_id     = $request->brand_id;
        $products->unit_id      = $request->unit_id;
        $products->description  = $request->description;

         if($request->file('images')) {
             $file              = $request->file('images');
             $filename          = $file->getClientOriginalName();
             $file->move('public/images/products', $filename);
             $products->images  = 'images/products/'.$filename;
         }
        $products->save();
        Alert::success('success','Data berhasil Ditambah');
        return redirect('products'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products  = Product::find($id);
        $categories = Category::all();
        $brands     = Brand::all();
        $units      = Unit::all();
        return view('products.edit', compact('products','categories','brands','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                'name' => 'required|min:2'
        ]);

        $products               = Product::find($id);
        $products->name         = $request->name;
        $products->code_product = $request->code_product;
        $products->stock        = $request->stock;
        $products->category_id  = $request->category_id;
        $products->brand_id     = $request->brand_id;
        $products->unit_id      = $request->unit_id;
        $products->description  = $request->description;

         if($request->file('images')) {
             $file              = $request->file('images');
             $filename          = $file->getClientOriginalName();
             $file->move('public/images/products', $filename);
             $products->images  = 'images/products/'.$filename;
         }
        $products->save();
        Alert::success('success','Data berhasil Diubah');
        return redirect('products'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        Alert::success('success','Data berhasil Dihapus');
        return redirect('products');
    }
}
