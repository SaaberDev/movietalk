<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    /*======================================================================
    ================================ GUEST =================================
    ======================================================================*/

    //PAGES View Route
    route::group(['prefix' => '/'], function (){
        route::get('/home', 'frontend\PagesController@index')->name('index');
        route::get('/about', 'frontend\PagesController@about')->name('about');
        route::get('/myBlog/{slug}', 'frontend\PagesController@singleBlog')->name('singleBlog');

        route::group(['prefix' => '/contact'], function (){
            route::get('/', 'frontend\contact\ContactController@contactForm')->name('contact');
            route::post('/', 'frontend\contact\ContactController@sendMail')->name('sendMail');
        });
    });

    /*======================================================================
    ================================ USER ==================================
    ======================================================================*/

    // Authentication Routes
    Auth::routes();
    /*->middleware(['auth', 'password.confirm'])*/ /*Confirm Password*/
    /*Route::get('/home', 'HomeController@index')->name('home');*/

    //User Profile
    route::group(['middleware' => 'role:user'], function (){
        route::get('/UserProfile/{user}', 'frontend\UserProfileController@viewUserProfile')->name('viewUserProfile');
        route::get('/EditUserProfile/{user}', 'frontend\UserProfileController@EditUserProfile')->name('EditUserProfile');
        route::patch('/UpdateProfile/{user}', 'frontend\UserProfileController@UpdateUserProfile')->name('UpdateUserProfile');
        route::get('/ChangePassword', 'frontend\UserProfileController@ChangePassword')->name('ChangePassword');
    });

    //POST BLOG CRUD Route
    route::group(['middleware' => 'role:user'], function (){
        route::get('/postBlog', 'frontend\PostController@createPost')->name('createPost');
        route::post('/store', 'frontend\PostController@storeBlog')->name('store');
        route::get('/myBlog', 'frontend\PostController@myBlog')->name('myBlog');
        route::get('/myBlog/edit/{id}', 'frontend\PostController@editBlog')->name('edit');
        route::post('/myBlog/update/{id}', 'frontend\PostController@updateBlog')->name('update');
        route::post('/myBlog/delete/{id}', 'frontend\PostController@destroy')->name('delete');
    });

    route::group(['prefix' => 'category'], function (){
        route::get('/CategoryList', 'frontend\CategoryController@CategoryList')->name('CategoryList');
        route::get('/{id}/{slug}', 'frontend\CategoryController@PostByCategory')->name('PostByCategory');
    });

    /*======================================================================
    ============================ ADMIN VIEW ================================
    ======================================================================*/
    //DASHBOARD Route
    route::group(['middleware' => 'role:admin'], function (){
        route::get('/dashboard', 'backend\admin\DashboardController@index')->name('dashboard');
        route::get('/managePost', 'backend\admin\ManagePostController@managePost')->name('managePost');
        route::get('/getPosts', 'backend\admin\ManagePostController@getPosts')->name('getPosts');
        route::get('/manageUser', 'backend\admin\ManageUserController@manageUser')->name('manageUser');
        route::get('/siteManagement', 'backend\admin\DashboardController@siteManagement')->name('siteManagement');

        //ADMIN Profile Route
        route::group(['prefix' => '/'], function (){
            route::get('/adminEditProfile/{user}', 'backend\admin\AdminProfileController@adminEditProfile')->name('adminEditProfile');
            /*route::get('/adminEditProfile/{user}', 'backend\admin\AdminProfileController@adminEditProfile')->name('adminEditProfile');
            route::get('/adminEditProfile/{user}', 'backend\admin\AdminProfileController@adminEditProfile')->name('adminEditProfile');
            route::get('/adminEditProfile/{user}', 'backend\admin\AdminProfileController@adminEditProfile')->name('adminEditProfile');*/
            /*route::get('/adminUpdateProfile/{user}', 'backend\admin\AdminProfileController@adminUpdateProfile')->name('adminUpdateProfile');*/
        });
    });

    //CATEGORY CRUD Route
    route::group(['middleware' => 'role:admin'], function (){
        route::get('/addCategory', 'backend\admin\CategoryController@addCategory')->name('addCategory');
        route::post('/storeCategory', 'backend\admin\CategoryController@storeCategory')->name('storeCategory');
        route::get('/categoryList', 'backend\admin\CategoryController@categoryList')->name('categoryList');
        route::get('/editCategory/{id}', 'backend\admin\CategoryController@editCategory')->name('editCategory');
        route::post('/updateCategory/{id}', 'backend\admin\CategoryController@updateCategory')->name('updateCategory');
        route::post('/deleteCategory/{id}', 'backend\admin\CategoryController@destroy')->name('deleteCategory');
    });

    //POST BLOG CRUD Route
    route::group(['middleware' => 'role:admin'], function (){
        route::get('/addPostAdmin', 'backend\admin\adminPostController@addPostAdmin')->name('addPostAdmin');
        route::post('/storePostAdmin', 'backend\admin\adminPostController@storePostAdmin')->name('storePostAdmin');
        route::get('/BlogListAdmin', 'backend\admin\adminPostController@BlogListAdmin')->name('BlogListAdmin');
        route::get('/editAdminPost/{id}', 'backend\admin\adminPostController@editAdminPost')->name('editAdminPost');
        route::post('/updateAdminPost/{id}', 'backend\admin\adminPostController@updateAdminPost')->name('updateAdminPost');
        route::post('/deleteAdminPost/{id}', 'backend\admin\adminPostController@destroy')->name('deleteAdminPost');
    });

    /*======================================================================
    ============================ APi ROUTES ============================
    ======================================================================*/
    // Online Status Route
    /*route::get('/check', 'UserOnlineStatusController@userOnlineStatus');*/


    /*======================================================================
    ============================ PACKAGE ROUTES ============================
    ======================================================================*/
