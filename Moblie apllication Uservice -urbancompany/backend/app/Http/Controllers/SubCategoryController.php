<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view("sub_category.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('sub_category.create', compact('category'));
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
            'sub_category' => 'required',
            'category' => 'required',
            'photo.*' => 'mimes:jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->store('images', 'public');

        $subCategory = new SubCategory();
        $subCategory->category = $request->category;
        $subCategory->sub_category = $request->sub_category;
        $subCategory->photo = $path;
        $subCategory->remarks = $request->remarks;
        $subCategory->status = $request->status;
        $subCategory->created_by = Auth::user()->name;
        $subCategory->updated_by = Auth::user()->name;
        $subCategory->save();
        return redirect()->route('sub_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $updatedBy = User::where('id', $subCategory->updated_by)->value('name');
        $createdBy = User::where('id', $subCategory->created_by)->value('name');
        $subCategory->updated_by = $updatedBy;
        $subCategory->created_by = $createdBy;
        return view('sub_category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $category = Category::get();
        return view('sub_category.edit', compact('subCategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $validator = Validator::make($request->all(), [
            'sub_category' => 'required',
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
            $path = $subCategory->photo;
        }
        $subCategory = SubCategory::find($subCategory->id);
        $subCategory->category = $request->category;
        $subCategory->sub_category = $request->sub_category;
        $subCategory->photo = $path;
        $subCategory->remarks = $request->remarks;
        $subCategory->status = $request->status;
        $subCategory->updated_by = Auth::user()->name;
        $subCategory->save();
        return redirect()->route('sub_category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('sub_category.index');
    }
}
