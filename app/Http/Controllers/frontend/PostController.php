<?php

    namespace App\Http\Controllers\frontend;

    use App\categories;
    use App\cover_PostImage;
    use App\Http\Controllers\Controller;
    use App\posts;
    use App\posts_images;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    use Image;

    class PostController extends Controller
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
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function createPost()
        {
            $primaryCategory = categories::orderBy('title', 'desc' )->get();
            return view('frontend.pages.post', compact('primaryCategory'));
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function storeBlog(Request $request)
        {
            $posts = new posts();
            $posts->user_id = Auth::id();

            $posts->title = $request->input('title');
            $posts->releaseDate = $request->input('date');
            $posts->subTitle = $request->input('subtitle');
            $posts->story = $request->input('story');
            $posts->slug = Str::slug($request->input('title') . '-' . time());
            $posts->category_id = $request->input('category');

            $posts->save();

            /*  ----- Store image for == COVER == photo -----
            === >> Single image upload*/
            if ($request->hasFile('uploadCoverFile')){
                $coverImage = $request->file('uploadCoverFile');
                $fileName = time() . 'Cover.' . $coverImage->getClientOriginalExtension();
                $location = public_path('img/cover/' . $fileName);

                $img = Image::make($coverImage)->resize(1920, 1080);
                $img->save($location);

                $postCoverImg = new cover_PostImage();
                $postCoverImg->post_id = $posts->id;
                $postCoverImg->cover_ImageFile = $fileName;
                $postCoverImg->save();
            }

            /*  ----- Store image for == CONTENT == photo -----
                === >> Multiple image upload*/
            /*if(count($request->uploadFile) > 0){
                $i = 0;
                foreach ($request->uploadFile as $image){
                    $fileName = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('img/posts/' . $i . '_' . $fileName);

                    $img = Image::make($image)->resize(1920, 1080);
                    $img->save($location);

                    $postImg = new posts_images();
                    $postImg->post_id = $posts->id;
                    $postImg->image_file = $i . '_' . $fileName;
                    $postImg->save();

                    $i++;
                }
            }*/
            return redirect()->route('createPost');
        }


        /**
         * Show the form for editing the specified resource.
         *
         * @param $slug
         * @param int $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function editBlog($id)
        {
            $editPosts = posts::find($id);
            $primaryCategory = categories::orderBy('title', 'desc')->get();
            $coverImage = cover_PostImage::where('post_id', $id)->first();
            $postImage = posts_images::where('post_id', $id)->first();

            if(!empty($editPosts)){
                return view('frontend.pages.editBlog', compact('editPosts', 'postImage', 'coverImage', 'primaryCategory'));
            }
            else{
                return redirect()->route('edit');
            }
        }


        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param $slug
         * @param int $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function updateBlog(Request $request, $id)
        {
            $posts = posts::find($id);
            $posts->user_id = Auth::id();

            $posts->title = $request->input('title');
            $posts->releaseDate = $request->input('date');
            $posts->subTitle = $request->input('subtitle');
            $posts->story = $request->input('story');
            $posts->slug = Str::slug($request->input('title') . '-' . time());
            $posts->category_id = $request->input('category');

            $posts->update();

            //Store image for cover photo
            if ($request->hasFile('uploadCoverFile')){
                $coverImage = $request->file('uploadCoverFile');
                $fileName = time() . 'Cover.' . $coverImage->getClientOriginalExtension();
                $location = public_path('img/cover/' . $fileName);

                $img = Image::make($coverImage)->resize(1920, 1080);
                $img->save($location);

                $postCoverImg = new cover_PostImage();
                $postCoverImg->post_id = $posts->id;
                $postCoverImg->cover_ImageFile = $fileName;
                $postCoverImg->save();
            }

            //Store image for content photo
            if(count($request->uploadFile) > 0){
                $i = 0;
                foreach ($request->uploadFile as $image){
                    $fileName = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('img/posts/' . $i . '_' . $fileName);

                    $img = Image::make($image)->resize(1920, 1080);
                    $img->save($location);

                    $postImg = new posts_images();
                    $postImg->image_caption = $request->caption;
                    $postImg->post_id = $posts->id;
                    $postImg->image_file = $i . '_' . $fileName;
                    $postImg->save();

                    $i++;
                }
            }
            return redirect()->route('myBlog');
        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function myBlog()
        {
            $myBlog = posts::orderBy('id','desc')->where('user_id', auth()->id())->get();
            $image = cover_PostImage::orderBy('id', 'desc')->get();
            return view('frontend.pages.myBlog', compact('myBlog', 'image'));
        }


        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy($id)
        {
            $postDelete = posts::find($id);
            if(!empty($postDelete)){
                $postDelete->delete();
            }
            return redirect()->back();
        }
    }
