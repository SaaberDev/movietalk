<?php

namespace App\Http\Controllers\backend\admin;

use App\categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        return view('backend.admin-panel.pages.addCategory');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function storeCategory(Request $request)
    {
        $category = new categories();
        $category->title = $request->titleCategory;
        $category->desc = $request->categoryDesc;
        $category->slug = Str::Slug($request->titleCategory . '-' . time());

        if ($request->hasFile('CategoryUploadFile')){
            $file = $request->file('CategoryUploadFile');
            $fileName = time() . 'MT.' . $file->getClientOriginalExtension();
            $location = public_path('admin-panel/img/category/' . $fileName);

            $img = Image::make($file);
            $img->save($location);
            $category->image = $fileName;
        }
        $category->save();

        session()->flash('success', 'New Category Successfully Added');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryList()
    {
        $category = categories::orderBy('id', 'desc')->get();
        return view('backend.admin-panel.pages.viewCategories', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
    {
        $editCategory = categories::find($id);
        if(!empty($editCategory)){
            return view('backend.admin-panel.pages.editCategory', compact('editCategory'));
        }
        else{
            return redirect()->route('editCategory');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        $category = categories::find($id);
        $category->title = $request->titleCategory;
        $category->desc = $request->categoryDesc;
        $category->slug = Str::Slug($request->titleCategory . '-' . time());

        if ($request->hasFile('CategoryUploadFile')){
            $file = $request->file('CategoryUploadFile');
            $fileName = time() . 'MT.' . $file->getClientOriginalExtension();
            $location = public_path('admin-panel/img/category/' . $fileName);

            $img = Image::make($file);
            $img->save($location);
            $category->image = $fileName;
        }
        $category->save();

        session()->flash('success', 'Category Successfully Updated');
        return redirect()->route('categoryList');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = categories::find($id);
        if (!empty($category)){
            $category->delete();
        }
        session()->flash('error', 'Category Successfully Deleted');
        return redirect()->route('categoryList');
    }
}
