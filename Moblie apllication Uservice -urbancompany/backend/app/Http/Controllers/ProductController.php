<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("product.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        $subCategory = SubCategory::get();
        return view('product.create', compact('category', 'subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('images', 'public');
        }else{
            $path = "";
        }

        $product = new Product();
        $product->product = $request->product;
        $product->price = $request->price;
        $product->photo = $path;
        $product->category = $request->category;
        $product->sub_category =  $request->sub_category;
        $product->created_by = Auth::user()->name;
        $product->updated_by = Auth::user()->name;
        $product->save();

        //Product::create($product->validated());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $updatedBy = User::where('id', $product->updated_by)->value('name');
        $createdBy = User::where('id', $product->created_by)->value('name');
        $product->updated_by = $updatedBy;
        $product->created_by = $createdBy;
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::get();
        $subCategory = SubCategory::get();
        return view('product.edit', compact('product', 'category', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('photo')){
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('images', 'public');
        }else{
            $path = "";
        }
        $product = Product::find($request->id);
        $product->product = $request->product;
        $product->price = $request->price;
        $product->photo = $path;
        $product->category = $request->category;
        $product->sub_category =  $request->sub_category;
        $product->created_by = Auth::user()->name;
        $product->updated_by = Auth::user()->name;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
