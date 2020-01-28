<?php

namespace App\Http\Controllers\frontend;

use App\cover_PostImage;
use App\Http\Controllers\Controller;
use App\posts;
use App\posts_images;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(){
        $posts = posts::orderBy('id', 'desc')->paginate(3);
        $imgCover = cover_PostImage::orderBy('post_id', 'desc')->get();
        return view('frontend.pages.index', compact('posts', 'imgCover'));
    }

    public function about(){
        return view('frontend.pages.about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleBlog($slug){
        $posts = posts::where('slug', $slug)->first();
        if (!empty($posts)){
            return view('frontend.pages.viewSinglePost', compact('posts'));
        }
        else{
            session()->flash('Errors', 'No Blog to View');
            return redirect()->route('singleBlog');
        }
    }
}
