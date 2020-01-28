<?php

namespace App\Http\Controllers\frontend;

use App\categories;
use App\Http\Controllers\Controller;
use App\posts;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostByCategory($id)
    {
        $TitleByCategory = categories::orderBy('title', 'asc')->where('id', $id)->get();
        $PostByCategory = posts::orderBy('id', 'desc')->where('category_id', $id)->get();
        if (!empty($PostByCategory)){
            return view('frontend.pages.categorySingleView', compact('PostByCategory', 'TitleByCategory'));
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CategoryList()
    {
        $showCategory = categories::orderBy('id', 'asc')->get();
        return view('frontend.pages.allCategory', compact('showCategory'));
    }
}
