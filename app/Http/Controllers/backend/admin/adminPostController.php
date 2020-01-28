<?php

namespace App\Http\Controllers\backend\admin;

use App\categories;
use App\cover_PostImage;
use App\Http\Controllers\Controller;
use App\posts;
use App\posts_images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class adminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addPostAdmin()
    {
        $primaryCategory = categories::orderBy('title', 'asc')->get();
        return view('backend.admin-panel.pages.postBlog', compact('primaryCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePostAdmin(Request $request)
    {
        $post = new posts();
        $post->title = $request->input('title');
        $post->subTitle = $request->input('subtitle');
        $post->releaseDate = $request->input('releaseDate');
        $post->story = $request->input('story');
        $post->story_two = $request->input('story_two');
        $post->slug = Str::slug($request->input('title') . '-' . time());
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;

        $post->save();

        //Single Image Upload Condition for == COVER IMAGE ==
        if ($request->hasFile('uploadCoverFile')){
            $coverImage = $request->file('uploadCoverFile');
            $fileName = time() . '.' . $coverImage->getClientOriginalExtension();
            $location = public_path('img/cover/' . $fileName);

            $img = Image::make($coverImage);
            $img->save($location);

            $coverImg = new cover_PostImage();
            $coverImg->post_id = $post->id;
            $coverImg->cover_ImageFile = $fileName;
            $coverImg->Save();
        }

        //Multiple Image Upload Condition == CONTENT IMAGE ==
        if(count($request->uploadFile) > 0){
            $i = 0;
            foreach ($request->uploadFile as $image){
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/posts/' . $i . '_' . $fileName);

                $img = Image::make($image);
                $img->save($location);

                $postImg = new posts_images();
                $postImg->image_caption = $request->caption;
                $postImg->post_id = $post->id;
                $postImg->image_file = $i . '_' .$fileName;
                $postImg->save();
                $i++;
            }
        }
        session()->flash('success', 'Post Successfully Added');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function BlogListAdmin()
    {
        $posts = posts::orderBy('id', 'desc')->get();
        $postsCoverImage = cover_PostImage::orderBy('id', 'desc')->get();
        $postsImage = posts_images::orderBy('id', 'desc')->get();
        return view('backend.admin-panel.pages.viewBlogList', compact('posts', 'postsImage', 'postsCoverImage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAdminPost($id)
    {
        $posts = posts::find($id);
        $primaryCategory = categories::orderBy('title', 'asc' )->get();
        $CoverImage = cover_PostImage::where('post_id', $id)->first();
        $PostImage = posts_images::where('post_id', $id)->first();
        return view('backend.admin-panel.pages.editAdminPost', compact('posts', 'CoverImage', 'PostImage', 'primaryCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAdminPost(Request $request, $id)
    {
        $posts = posts::find($id);
        $posts->title = $request->input('title');
        $posts->subTitle = $request->input('subtitle');
        $posts->releaseDate = $request->input('releaseDate');
        $posts->story = $request->input('story');
        $posts->story_two = $request->input('story_two');
        $posts->slug = Str::slug($request->input('title') . '-' . time());
        $posts->category_id = $request->category;
        $posts->user_id = Auth::user()->id;

        $posts->update();

        //Single Image Upload Condition for == COVER IMAGE ==
        if ($request->hasFile('uploadCoverFile')){
            $coverImage = $request->file('uploadCoverFile');
            $fileName = time() . '.' . $coverImage->getClientOriginalExtension();
            $location = public_path('img/cover/' . $fileName);

            $img = Image::make($coverImage);
            $img->save($location);

            $coverImg = new cover_PostImage();
            $coverImg->post_id = $posts->id;
            $coverImg->cover_ImageFile = $fileName;
            $coverImg->Save();
        }

        //Multiple Image Upload Condition == CONTENT IMAGE ==
        if($request->uploadFile > 0){
            $i = 0;
            foreach ($request->uploadFile as $image){
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/posts/'. $i . '_' . $fileName);

                $img = Image::make($image);
                $img->save($location);

                $postImg = new posts_images();
                $postImg->image_caption = $request->caption;
                $postImg->post_id = $posts->id;
                $postImg->image_file = $i . '_' .$fileName;
                $postImg->save();
                $i++;
            }
        }
        session()->flash('success', 'Post Successfully Updated');
        return redirect()->route('BlogListAdmin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = posts::find($id);
        if(!empty($posts)){
            $posts->delete();
        }
        session()->flash('error', 'Post Successfully Deleted');
        return redirect()->back();
    }
}
